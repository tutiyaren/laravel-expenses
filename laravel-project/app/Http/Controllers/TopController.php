<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Income;
use App\Models\Spending;

class TopController extends Controller
{
    public function index()
    {
        $userId = auth()->user()->id;
        $currentYear = date('Y');
        $incomeData = Income::getYearlyData();
        $spendingData = Spending::getYearlyData();

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

        return view('top.index', compact('years', 'selectedYear', 'monthIncomes', 'monthSpendings'));
    }
}
