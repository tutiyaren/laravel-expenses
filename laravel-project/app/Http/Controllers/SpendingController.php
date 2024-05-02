<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SpendingController extends Controller
{
    public function index()
    {
        return view('spending.index');
    }

    public function create()
    {
        return view('spending.create');
    }

    public function edit()
    {
        return view('spending.edit');
    }
}
