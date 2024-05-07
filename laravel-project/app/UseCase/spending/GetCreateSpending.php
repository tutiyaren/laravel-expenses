<?php
namespace App\UseCase\spending;
use App\Models\Category;

class GetCreateSpending
{
    public function __invoke($userId)
    {
        return Category::where('user_id', $userId)->get();
    }
}
