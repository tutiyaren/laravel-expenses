<?php
namespace App\UseCase\income;
use App\Models\Income;
use Illuminate\Http\Request;

class DeleteIncome
{
    public function __invoke(Request $request)
    {
        $incomeId = $request->input('id');
        $income = Income::find($incomeId);
        $income->delete();
    }
}
