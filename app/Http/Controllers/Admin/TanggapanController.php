<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TanggapanController extends Controller
{
    //
    function store(Request $request)
    {
        // return $request->all();
        $user = Auth::user()->load(['petugas']);
        $isTerima = $request->terima;
        $isTolak = $request->tolak;

        $data = $request->all();
        foreach ($request->all() as $key => $value) {
            $split = explode("-", $key);
            if (count($split) > 1) {
                $data['id_pengaduan'] = (int)$split[1];
                $data['isi_tanggapan'] = $value;
            }
        }

        $data['tgl_pengaduan'] = $isTerima ? $isTerima : $isTolak;

        // Jika admin / petugas ingin menolak tanpa mengirim pesan, pesan bisa dikosongka
        $validasi = Validator::make($data, [
            'id_pengaduan' => ['required', 'integer', 'unique:tanggapan'],
            'isi_tanggapan' => $isTerima ? ['required'] : [],
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi->errors())->withInput($request->all());
        }

        // return $data;


        $insertTanggapan = Tanggapan::create([
            'id_pengaduan' => $data['id_pengaduan'],
            'tgl_pengaduan' => $data['tgl_pengaduan'],
            'tanggapan' => $data['isi_tanggapan'],
            'id_petugas' => $user['petugas']['id_petugas']
        ]);

        DB::table('pengaduan')->where('id_pengaduan', $data['id_pengaduan'])->update([
            'status' => $isTerima ? 'proses' : '0'
        ]);

        if ($insertTanggapan) {
            return 'berhasil insert';
        } else {
            return 'gagal insert ya';
        }
    }
}
