<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\IncomeRequest;
use App\Models\Income_source;
use App\Models\Income;
use Illuminate\Support\Facades\Auth;
use App\UseCase\income\CreateIncome;
use App\UseCase\income\EditIncome;
use App\UseCase\income\DeleteIncome;
use App\UseCase\income\GetEditIncome;
use App\UseCase\income\GetCreateIncome;
use App\UseCase\income\GetAllIncome;

class IncomeController extends Controller
{
    public function index(Request $request)
    {
        $userId = auth()->user()->id;
        $income_source_id = $request->input('income_source_id');
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $query = Income::where('user_id', $userId)
            ->IncomeSourceSearch($income_source_id)
            ->DateSearch($start_date, $end_date);
        $incomes = $query->get();
        $totalAmount = $incomes->sum('amount');
        $income_sources = Income_source::where('user_id', $userId)->get();
        return view('income.index', compact('incomes', 'totalAmount', 'income_sources'));
    }

    public function create(GetCreateIncome $case)
    {
        $income_sources = $case(auth()->id());
        return view('income.create', compact('income_sources'));
    }

    public function store(IncomeRequest $request, CreateIncome $case)
    {
        $case($request);
        return redirect()->route('income.index');
    }

    public function edit($id, GetEditIncome $case)
    {
        list($income, $income_sources) = $case($id);
        return view('income.edit', compact('income', 'income_sources'));
    }

    public function update(IncomeRequest $request, EditIncome $case)
    {
        $case($request);
        return redirect()->route('income.index');
    }

    public function delete(Request $request, DeleteIncome $case)
    {
        $case($request);
        return redirect()->route('income.index');
    }
}
