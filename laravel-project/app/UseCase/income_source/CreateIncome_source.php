<?php
namespace App\UseCase\income_source;
use App\Models\Income_source;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CreateIncome_source
{
    public function __invoke(Request $request)
    {
        $income_source = new Income_source();
        $income_source->user_id = Auth::id();
        $income_source->name = $request->name;
        $income_source->save();
    }
}
