<?php
namespace App\UseCase\spending;
use App\Models\Category;

class GetCreateSpending
{
    public function __invoke()
    {
        return Category::get();
    }
}
