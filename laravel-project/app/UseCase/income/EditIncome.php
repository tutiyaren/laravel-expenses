<?php
namespace App\UseCase\income;
use App\Models\Income;
use Illuminate\Http\Request;

class EditIncome
{
    public function __invoke(Request $request)
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
    }
}
