<?php
namespace App\UseCase\income;
use App\Models\Income_source;

class GetCreateIncome
{
    public function __invoke($userId)
    {
        return Income_source::where('user_id', $userId)->get();
    }
}
