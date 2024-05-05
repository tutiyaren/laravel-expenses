<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Income;
use App\Models\Spending;
use App\UseCase\GetTopUseCase;

class TopController extends Controller
{
    public function index(GetTopUseCase $case)
    {
        $userId = auth()->user()->id;
        list($years, $selectedYear,$monthIncomes, $monthSpendings) = $case($userId);
        return view('top.index', compact('years', 'selectedYear', 'monthIncomes', 'monthSpendings'));
    }
}
