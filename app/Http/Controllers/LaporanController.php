<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Masyarakat;
use App\Models\Pengaduan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Psr\Http\Message\ResponseInterface;
use Throwable;

class LaporanController extends Controller
{
    //
    private $user;
    private $masyarakat;

    function __construct()
    {
        // $this->user = Auth::user();
        // $this->masyarakat = $this->user->load(['masyarakat'])['masyarakat'];
    }

    function create()
    {
        return view('laporan.create');
    }

    function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $input = $request->validate([
                'isi_laporan' => ['required', 'string', 'min:10'],
                'foto_bukti' => ['required'],
                'detail_alamat' => ['required', 'min:5'],
                'subject' => ['required', 'min:5']
            ]);

            $photos = $request->file('foto_bukti');

            $allowedfileExtension = ['jpg', 'png', 'mp4'];

            $photoValidasi = [];

            $images = [];

            foreach ($photos as $key => $photo) {
                $filename = $photo->getClientOriginalName();
                $extension = $photo->getClientOriginalExtension();
                $check = in_array($extension, $allowedfileExtension);
                if ($check) {
                    $waktuSaatIni = time() . $key;
                    $namaFile = "{$waktuSaatIni}.{$extension}";
                    $moving = $photo->move('storage/images', $namaFile);

                    array_push($images, "{$request->root()}/{$moving->getPathname()}");
                    $photoValidasi[$filename] = true;
                } else {
                    $photoValidasi[$filename] = false;
                }
            }

            $dataImage = Image::create([
                'images' => json_encode($images)
            ]);

            $user = Auth::user()->load(['masyarakat']);

            // DB::rollBack();
            $nik = $user['masyarakat']['nik'];

            $insertPengaduan = Pengaduan::create([
                'tgl_pengaduan' => date('Y-m-d'),
                'nik' => $nik,
                'subject' => $input['subject'],
                'isi_laporan' => $input['isi_laporan'],
                'lokasi_pengaduan' => $input['detail_alamat'],
                'image_id' => $dataImage['id'],
                'status' => 'proses'
            ]);

            DB::commit();
            if ($insertPengaduan) {
                return redirect()->back()->with('message', 'success insert');
            }
        } catch (Throwable $e) {
            DB::rollBack();
            return redirect()->back()->with('error', env('APP_ENV') == 'local' ? $e->getMessage() : 'ups maaf, ada error')->withInput($request->input());
        }
    }

    function index()
    {
        $user = Auth::user()->load(['masyarakat.pengaduan.images']);
        $masyarakat =  $user['masyarakat'];
        $pengaduan = $masyarakat['pengaduan'];

        return view('laporan.index', compact(['pengaduan']));
    }
}
