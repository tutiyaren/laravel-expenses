<?php
namespace App\UseCase\income;
use App\Models\Income;
use Illuminate\Http\Request;
use App\Models\Income_source;

class GetAllIncome
{
    public function __invoke(Request $request)
    {
        $userId = auth()->user()->id;
        $income_source_id = $request->input('income_source_id');
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $query = Income::query();
        $query->where('user_id', $userId);
        if ($income_source_id !== null) {
            $query->where('income_source_id', $income_source_id);
        }
        if ($start_date) {
            $query->whereDate('accrual_date', '>=', $start_date);
        }
        if ($end_date) {
            $query->whereDate('accrual_date', '<=', $end_date);
        }
        $incomes = $query->get();
        $totalAmount = $incomes->sum('amount');
        $income_sources = Income_source::where('user_id', $userId)->get();

        return [$incomes, $totalAmount, $income_sources];
    }
}
