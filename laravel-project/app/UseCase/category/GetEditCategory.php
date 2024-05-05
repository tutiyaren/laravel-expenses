<?php
namespace App\UseCase\category;
use App\Models\Category;

class GetEditCategory
{
    public function __invoke($id)
    {
        return Category::find($id);
    }
}
