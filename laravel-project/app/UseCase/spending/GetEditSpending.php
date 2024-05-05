<?php
namespace App\UseCase\spending;
use App\Models\Spending;
use App\Models\Category;

class GetEditSpending
{
    public function __invoke($id)
    {
        $spending = Spending::find($id);
        $categories = Category::get();
        return [$spending, $categories];
    }
}
