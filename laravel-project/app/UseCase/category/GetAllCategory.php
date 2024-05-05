<?php
namespace App\UseCase\category;
use App\Models\Category;

class GetAllCategory
{
    public function __invoke()
    {
        $userId = auth()->user()->id;
        return Category::where('user_id', $userId)->get();
    }
}
