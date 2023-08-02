<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    function page_login()
    {
        return view('auth.login');
    }

    function page_register() {
        return view('auth.register');
    }
}
