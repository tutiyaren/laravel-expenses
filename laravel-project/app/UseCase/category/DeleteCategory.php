<?php
namespace App\UseCase\category;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Spending;

class DeleteCategory
{
    public function __invoke(Request $request)
    {
        $categoryId = $request->input('id');
        $usedInSpendings = Spending::where('category_id', $categoryId)->exists();
        if ($usedInSpendings) {
            return redirect()->back()->with('error', 'このカテゴリーは支出に使用されているため、削除できません。');
        }
        $category = Category::find($categoryId);
        $category->delete();
    }
}
