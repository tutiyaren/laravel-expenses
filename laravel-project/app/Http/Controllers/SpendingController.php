<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SpendingRequest;
use App\UseCase\spending\CreateSpending;
use App\UseCase\spending\EditSpending;
use App\UseCase\spending\DeleteSpending;
use App\UseCase\spending\GetEditSpending;
use App\UseCase\spending\GetCreateSpending;
use App\UseCase\spending\GetAllSpending;

class SpendingController extends Controller
{
    public function index(Request $request, GetAllSpending $case)
    {
        list($spendings, $totalAmount, $categories) = $case($request);
        return view('spending.index', compact('spendings', 'totalAmount', 'categories'));
    }

    public function create(GetCreateSpending $case)
    {
        $categories = $case(auth()->id());
        return view('spending.create', compact('categories'));
    }

    public function store(SpendingRequest $request, CreateSpending $case)
    {
        $case($request);
        return redirect()->route('spending.index');
    }

    public function edit($id, GetEditSpending $case)
    {
        list($spending, $categories) = $case($id);
        return view('spending.edit', compact('spending', 'categories'));
    }

    public function update(SpendingRequest $request, EditSpending $case)
    {
        $case($request);
        return redirect()->route('spending.index');
    }

    public function delete(Request $request, DeleteSpending $case)
    {
        $case($request);
        return redirect()->route('spending.index');
    }
}
