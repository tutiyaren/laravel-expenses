<?php
namespace App\UseCase\income;
use App\Models\Income;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CreateIncome
{
    public function __invoke(Request $request)
    {
        $income = new Income();
        $income->user_id = Auth::id();
        $income->income_source_id = $request->input('income_source_id');
        $income->amount = $request->input('amount');
        $income->accrual_date = $request->input('accrual_date');
        $income->save();
    }
}
