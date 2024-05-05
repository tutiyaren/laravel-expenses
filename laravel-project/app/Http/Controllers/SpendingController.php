<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SpendingRequest;
use App\Models\Category;
use App\Models\Spending;
use App\UseCase\spending\CreateSpending;
use App\UseCase\spending\EditSpending;
use App\UseCase\spending\DeleteSpending;
use App\UseCase\spending\GetEditSpending;
use App\UseCase\spending\GetCreateSpending;
use App\UseCase\spending\GetAllSpending;

class SpendingController extends Controller
{
    public function index(Request $request)
    {
        $userId = auth()->user()->id;
        $categories = Category::where('user_id', $userId)->get();
        $category_id = $request->input('category_id');
        $start_date = $request->input('from');
        $end_date = $request->input('until');
        $query = Spending::query();
        $query->where('user_id', $userId);
        if ($category_id) {
            $query->where('category_id', $category_id);
        }
        if ($start_date) {
            $query->whereDate('accrual_date', '>=', $start_date);
        }
        if ($end_date) {
            $query->whereDate('accrual_date', '<=', $end_date);
        }
        $spendings = $query->with('category')->get();
        $totalAmount = $spendings->sum('amount');
        return view('spending.index', compact('spendings', 'totalAmount', 'categories'));
    }

    public function create(GetCreateSpending $case)
    {
        $categories = $case(auth()->id());
        return view('spending.create', compact('categories'));
    }

    public function store(SpendingRequest $request, CreateSpending $case)
    {
        $case($request);
        return redirect()->route('spending.index');
    }

    public function edit($id, GetEditSpending $case)
    {
        list($spending, $categories) = $case($id);
        return view('spending.edit', compact('spending', 'categories'));
    }

    public function update(SpendingRequest $request, EditSpending $case)
    {
        $case($request);
        return redirect()->route('spending.index');
    }

    public function delete(Request $request, DeleteSpending $case)
    {
        $case($request);
        return redirect()->route('spending.index');
    }
}
