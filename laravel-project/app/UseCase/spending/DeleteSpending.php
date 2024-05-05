<?php
namespace App\UseCase\spending;
use App\Models\Spending;
use Illuminate\Http\Request;

class DeleteSpending
{
    public function __invoke(Request $request)
    {
        $spendingId = $request->input('id');
        $spending = Spending::find($spendingId);
        $spending->delete();
    }
}
