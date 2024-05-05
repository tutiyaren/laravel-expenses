<?php
namespace App\UseCase;
use App\Models\Income;
use App\Models\Spending;

class GetTopUseCase
{
    public function __invoke($userId)
    {
        $currentYear = date('Y');
        $incomeData = Income::getYearlyData($userId);
        $spendingData = Spending::getYearlyData($userId);

        $incomeYears = $incomeData->pluck('year')->unique();
        $spendingYears = $spendingData->pluck('year')->unique();
        $years = $incomeYears->merge($spendingYears)->unique()->sort();

        $selectedYear = request()->input('year', $currentYear);
        $monthIncomes = [];
        $monthSpendings = [];

        foreach ($incomeData as $income) {
            $monthIncomes[$income->year][$income->month] = $income->total;
        }

        foreach ($spendingData as $spending) {
            $monthSpendings[$spending->year][$spending->month] = $spending->total;
        }

        foreach ($years as $year) {
            $monthIncomes[$year] = $monthIncomes[$year] ?? [];
            $monthSpendings[$year] = $monthSpendings[$year] ?? [];

            for ($month = 1; $month <= 12; $month++) {
                $monthIncomes[$year][$month] = $monthIncomes[$year][$month] ?? 0;
                $monthSpendings[$year][$month] = $monthSpendings[$year][$month] ?? 0;
            }
        }

        return [$years, $selectedYear, $monthIncomes, $monthSpendings];
    }
}
