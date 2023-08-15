<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Masyarakat;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    //
    function index()
    {
        $pengaduan = Pengaduan::with(['images', 'masyarakat.user'])->orderBy('id_pengaduan', 'DESC')->cursorPaginate(10);
        return view('laporan.index', compact(['pengaduan']));
    }

}
