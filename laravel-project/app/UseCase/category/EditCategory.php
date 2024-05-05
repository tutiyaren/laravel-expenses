<?php
namespace App\UseCase\category;
use App\Models\Category;
use Illuminate\Http\Request;

class EditCategory
{
    public function __invoke(Request $request, $categoryId)
    {
        $categoryName = $request->input('name');
        $category = Category::find($categoryId);
        $category->name = $categoryName;
        $category->save();
    }
}
