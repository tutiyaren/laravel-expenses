<?php
namespace App\UseCase\category;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CreateCategory
{
    public function __invoke(Request $request)
    {
        $category = new Category();
        $category->user_id = Auth::id();
        $category->name = $request->name;
        $category->save();
    }
}
