<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanController extends Controller
{
    //
    function create()
    {
        return view('laporan.create');
    }
}
