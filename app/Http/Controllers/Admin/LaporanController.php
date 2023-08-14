<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Masyarakat;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LaporanController extends Controller
{
    //
    function index()
    {
        $pengaduan = Pengaduan::with(['images', 'masyarakat.user'])->orderBy('created_at', 'DESC')->get();
        return view('laporan.index', compact(['pengaduan']));
    }

    // function
}
