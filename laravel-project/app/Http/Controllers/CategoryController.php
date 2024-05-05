<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\UseCase\category\CreateCategory;
use App\UseCase\category\EditCategory;
use App\UseCase\category\DeleteCategory;
use App\UseCase\category\GetEditCategory;
use App\UseCase\category\GetAllCategory;

class CategoryController extends Controller
{
    public function index(GetAllCategory $case)
    {
        $categories = $case();
        return view('category.index', compact('categories'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(CategoryRequest $request, CreateCategory $case)
    {
        $case($request);
        return redirect()->route('category.index');
    }

    public function edit($id, GetEditCategory $case)
    {
        $category = $case($id);
        return view('category.edit', compact('category'));
    }

    public function update(CategoryRequest $request, EditCategory $case)
    {
        $categoryId = $request->input('id');
        $case($request, $categoryId);
        return redirect()->route('category.index');
    }

    public function delete(Request $request, DeleteCategory $case)
    {
        $case($request);
        return redirect()->route('category.index');
    }
}
