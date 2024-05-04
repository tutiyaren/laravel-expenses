<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SpendingRequest;
use App\Models\Category;
use App\Models\Spending;
use Illuminate\Support\Facades\Auth;

class SpendingController extends Controller
{
    public function index(Request $request)
    {
        $userId = auth()->user()->id;
        $categories = Category::get();
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

    public function create()
    {
        $categories = Category::get();
        return view('spending.create', compact('categories'));
    }

    public function store(SpendingRequest $request)
    {
        $spending = new Spending();
        $spending->user_id = Auth::id();
        $spending->category_id = $request->input('category_id');
        $spending->name = $request->input('name');
        $spending->amount = $request->input('amount');
        $spending->accrual_date = $request->input('accrual_date');
        $spending->save();
        return redirect()->route('spending.index');
    }

    public function edit($id)
    {
        $spending = Spending::find($id);
        $categories = Category::get();
        return view('spending.edit', compact('spending', 'categories'));
    }

    public function update(SpendingRequest $request)
    {
        $spendingId = $request->input('id');
        $spendingName = $request->input('name');
        $spendingCategory = $request->input('category_id');
        $spendingAmount = $request->input('amount');
        $spendingDate = $request->input('accrual_date');
        $spending = Spending::find($spendingId);
        $spending->name = $spendingName;
        $spending->category_id = $spendingCategory;
        $spending->amount = $spendingAmount;
        $spending->accrual_date = $spendingDate;
        $spending->save();
        return redirect()->route('spending.index');
    }

    public function delete(Request $request)
    {
        $spendingId = $request->input('id');
        $spending = Spending::find($spendingId);
        $spending->delete();
        return redirect()->route('spending.index');
    }
}
