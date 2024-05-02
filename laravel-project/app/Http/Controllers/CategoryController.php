<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::get();
        return view('category.index', compact('categories'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(CategoryRequest $request)
    {
        $category = new Category();
        $category->user_id = Auth::id();
        $category->name = $request->name;
        $category->save();

        return redirect()->route('category.index');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('category.edit', compact('category'));
    }

    public function update(CategoryRequest $request)
    {
        $categoryId = $request->input('id');
        $categoryName = $request->input('name');
        $category = Category::find($categoryId);
        $category->name = $categoryName;
        $category->save();
        return redirect()->route('category.index');
    }

    public function delete(Request $request)
    {
        $categoryId = $request->input('id');
        $category = Category::find($categoryId);
        $category->delete();
        return redirect()->route('category.index');
    }
}
