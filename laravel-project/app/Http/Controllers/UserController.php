<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function confirmed()
    {
        return view('auth.confirmed');
    }

    public function login()
    {
        return view('auth.login');
    }
}
