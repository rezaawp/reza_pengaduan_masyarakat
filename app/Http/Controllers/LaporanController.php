<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Masyarakat;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Psr\Http\Message\ResponseInterface;
use Throwable;

class LaporanController extends Controller
{
    //
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

                    array_push($images, "{$request->getHttpHost()}/{$moving->getPathname()}");
                    $photoValidasi[$filename] = true;
                } else {
                    $photoValidasi[$filename] = false;
                }
            }

            $dataImage = Image::create([
                'images' => json_encode($images)
            ]);


            $nik = Masyarakat::where('user_id', Auth::user()->id)->first();

            $nik = $nik['nik'];

            $insertPengaduan = Pengaduan::create([
                'tgl_pengaduan' => date('Y-m-d'),
                'nik' => $nik,
                'subject' => $input['subject'],
                'isi_laporan' => $input['isi_laporan'],
                'lokasi_pengaduan' => $input['detail_alamat'],
                'image_id' => $dataImage['id']
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
        return view('laporan.index');
    }
}
