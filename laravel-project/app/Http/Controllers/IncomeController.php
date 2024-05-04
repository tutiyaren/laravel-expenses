<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\IncomeRequest;
use App\Models\Income_source;
use App\Models\Income;
use Illuminate\Support\Facades\Auth;

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
        $income_sources = Income_source::get();
        return view('income.index', compact('incomes', 'totalAmount', 'income_sources'));
    }

    public function create()
    {
        $income_sources = Income_source::get();
        return view('income.create', compact('income_sources'));
    }

    public function store(IncomeRequest $request)
    {
        $income = new Income();
        $income->user_id = Auth::id();
        $income->income_source_id = $request->input('income_source_id');
        $income->amount = $request->input('amount');
        $income->accrual_date = $request->input('accrual_date');
        $income->save();
        return redirect()->route('income.index');
    }

    public function edit($id)
    {
        $income = Income::find($id);
        $income_sources = Income_source::get();
        return view('income.edit', compact('income', 'income_sources'));
    }

    public function update(IncomeRequest $request)
    {
        $incomeId = $request->input('id');
        $incomeIncome_source = $request->input('income_source_id');
        $incomeAmount = $request->input('amount');
        $incomeDate = $request->input('accrual_date');
        $income = Income::find($incomeId);
        $income->income_source_id = $incomeIncome_source;
        $income->amount = $incomeAmount;
        $income->accrual_date = $incomeDate;
        $income->save();
        return redirect()->route('income.index');
    }

    public function delete(Request $request)
    {
        $incomeId = $request->input('id');
        $income = Income::find($incomeId);
        $income->delete();
        return redirect()->route('income.index');
    }
}
