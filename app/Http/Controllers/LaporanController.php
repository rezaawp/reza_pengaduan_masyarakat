<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Psr\Http\Message\ResponseInterface;

class LaporanController extends Controller
{
    //
    function create()
    {
        return view('laporan.create');
    }

    function store(Request $request)
    {

        $data = $request->validate([
            'isi_laporan' => ['required', 'string', 'min:10'],
            'foto_bukti' => ['required'],
            'detail_alamat' => ['required', 'min:5'],
            'subject' => ['required', 'min:5']
        ]);

        $photos = $request->file('foto_bukti');

        $allowedfileExtension = ['jpg', 'png', 'mp4'];

        $photoValidasi = [];

        foreach ($photos as $photo) {
            $filename = $photo->getClientOriginalName();
            $extension = $photo->getClientOriginalExtension();
            $check = in_array($extension, $allowedfileExtension);
            if ($check) {
                $waktuSaatIni = time();
                $photo->move('storage', "{$waktuSaatIni}.{$extension}");
                $photoValidasi[$filename] = true;
            } else {
                $photoValidasi[$filename] = false;
            }
        }
    }

    function index()
    {
        return view('laporan.index');
    }
}
