<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IncomeSourceController extends Controller
{
    public function index()
    {
        return view('income_source.index');
    }

    public function create()
    {
        return view('income_source.create');
    }

    public function edit()
    {
        return view('income_source.edit');
    }
}
