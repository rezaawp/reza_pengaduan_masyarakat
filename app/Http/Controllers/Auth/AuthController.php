<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    function page_login()
    {
        return view('auth.login');
    }

    function page_register()
    {
        return view('auth.register');
    }
}
