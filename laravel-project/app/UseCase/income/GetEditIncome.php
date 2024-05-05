<?php
namespace App\UseCase\income;
use App\Models\Income;
use App\Models\Income_source;

class GetEditIncome
{
    public function __invoke($id)
    {
        $income = Income::find($id);
        $income_sources = Income_source::get();
        return [$income, $income_sources];
    }
}
