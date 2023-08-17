<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Masyarakat;
use App\Models\Pengaduan;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class LaporanController extends Controller
{
    //
    function index()
    {
        $pengaduan = Pengaduan::with(['images', 'masyarakat.user'])->orderBy('id_pengaduan', 'DESC')->cursorPaginate(10);
        return view('laporan.index', compact(['pengaduan']));
    }

    function validasiCetakLaporan(Request $request)
    {
        try {
            $idPengaduan = (int)$request->id_pengaduan;

            $validasi = Validator::make([
                'id_pengaduan' => $idPengaduan,
            ], [
                'id_pengaduan' => ['required', 'integer']
            ]);

            if ($validasi->fails()) {
                return response()->json([
                    'status' => 422,
                    'error' => $validasi->errors()
                ], 422);
            }

            $tanggapan = Pengaduan::where('id_pengaduan', $idPengaduan)->with('tanggapan')->first();

            if (!$tanggapan['tanggapan']) {
                return response()->json([
                    'status' => 400,
                    'error' => 'pengaduan ini belum diberi tanggapan. silahkan beri tanggapan terlebih dahulu'
                ], 400);
            }

            return response()->json([
                'status' => 'OK',
                'data' => $tanggapan,
            ]);
        } catch (Exception $e) {
            if (env('APP_ENV') === 'local') {
                return response()->json([
                    'error' => $e->getMessage()
                ], 500);
            } else {
                return response()->json([
                    'error' => '500 internal sever error'
                ], 500);
            }
        }
    }

    function cetakLaporan(Request $request)
    {
        $idPengaduan = (int)$request->id_pengaduan;

        $validasi = Validator::make([
            'id_pengaduan' => $idPengaduan
        ], [
            'id_pengaduan' => ['required', 'integer']
        ]);

        if ($validasi->fails()) {
            return response()->json([
                'status' => 422,
                'error' => $validasi->errors()
            ], 422);
        }

        $pengaduan =  DB::table('pengaduan')
            ->where('pengaduan.id_pengaduan', $idPengaduan)
            ->join('tanggapan', 'pengaduan.id_pengaduan', '=', 'tanggapan.id_pengaduan', 'left')
            ->join('images', 'pengaduan.image_id', '=', 'images.id')
            ->join('masyarakat', 'pengaduan.nik', '=', 'masyarakat.nik')
            ->join('users', 'masyarakat.user_id', '=', 'users.id')
            ->select('pengaduan.*', 'tanggapan.*', 'images.*', 'masyarakat.*', 'users.name as nama_user')->first();

        if (!$pengaduan->tanggapan) {
            return response()->json([
                'status' => 404,
                'erorr' => 'tanggapan tidak dapat ditemukan'
            ], 404);
        }

        $images = [];
        foreach (json_decode($pengaduan->images) as $image) {
            $image = explode('/', $image);

            $imagePath = "./";
            for ($i = 3; $i <= 5; $i++) {
                if ($i !== 5)
                    $imagePath .= $image[$i] . '/';
                if ($i == 5)
                    $imagePath .= $image[$i];
            }

            array_push($images, $imagePath);
        }

        $pengaduan->images = $images;

        $pdf = Pdf::loadView('laporan.pdf', [
            'item' => [
                'dari' => $pengaduan->nama_user,
                'tgl_pengaduan' => $pengaduan->tgl_pengaduan,
                'lokasi_pengaduan' => $pengaduan->lokasi_pengaduan,
                'isi_laporan' => $pengaduan->isi_laporan,
                'images' => $pengaduan->images
            ],
        ])->setPaper('a4', 'potrait')->setWarnings(false);
        return $pdf->download("pengaduan-" . $pengaduan->nama_user . "-" . $pengaduan->tgl_pengaduan . "__" . time() . ".pdf");
    }
}
