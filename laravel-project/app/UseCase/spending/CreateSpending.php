<?php
namespace App\UseCase\spending;
use App\Models\Spending;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CreateSpending
{
    public function __invoke(Request $request)
    {
        $spending = new Spending();
        $spending->user_id = Auth::id();
        $spending->category_id = $request->input('category_id');
        $spending->name = $request->input('name');
        $spending->amount = $request->input('amount');
        $spending->accrual_date = $request->input('accrual_date');
        $spending->save();
    }
}
