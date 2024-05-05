<?php
namespace App\UseCase\spending;
use App\Models\Spending;
use Illuminate\Http\Request;

class EditSpending
{
    public function __invoke(Request $request)
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
    }
}
