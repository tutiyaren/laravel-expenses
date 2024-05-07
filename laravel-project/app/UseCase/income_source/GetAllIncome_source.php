<?php
namespace App\UseCase\income_source;
use App\Models\Income_source;

class GetAllIncome_source
{
    public function __invoke()
    {
        $userId = auth()->user()->id;
        return Income_source::where('user_id', $userId)->get();
    }
}
