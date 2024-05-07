<?php
namespace App\UseCase\spending;
use App\Models\Spending;
use Illuminate\Http\Request;
use App\Models\Category;

class GetAllSpending
{
    public function __invoke(Request $request)
    {
        $userId = auth()->user()->id;
        $categories = Category::where('user_id', $userId)->get();
        $category_id = $request->input('category_id');
        $start_date = $request->input('from');
        $end_date = $request->input('until');
        $query = Spending::query();
        $query->where('user_id', $userId);
        if ($category_id !== null) {
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

        return [$spendings, $totalAmount, $categories];
    }
}
