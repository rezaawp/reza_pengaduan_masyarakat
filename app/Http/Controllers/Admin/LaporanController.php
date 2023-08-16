<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Masyarakat;
use App\Models\Pengaduan;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Http\Request;
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

        $pdf = Pdf::loadView('laporan.pdf', [
            'item' => [
                'tgl_pengaduan' => '2023-06-19',
                'lokasi_pengaduan' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Suscipit, molestiae. Porro, quo nam! Aspernatur dolorum, aperiam mollitia officia perferendis quaerat hic odio commodi, velit optio eius ex dicta nobis at.',
                'isi_laporan' => 'Ini adalah isi laporan yang simpel ajah'
            ],
            'data' => [
                [
                    'tes' => "yoi",
                    'testing' => "testing"
                ],
                [
                    'tes' => "yo2",
                    'testing' => "testing2"
                ]
            ]
        ])->setPaper('a4', 'potrait');
        return $pdf->download('yoi.pdf');
    }
}
