<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;
use App\Models\Category;

class CategoriesController extends Controller
{
    public function __invoke()
    {
        $categories = Category::all();
        return view('main.category', compact('categories'));
    }
    public function create()
    {
        return view('main.category_create');
    }

    public function store(StoreRequest $request)
    {
        $categories = $request->validated();
        Category::firstOrCreate($categories);
        return redirect()->route('admin.category');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.category');
    }

    public function edit(Category $category)
    {
        return view('main.category_edit', compact('category'));
    }

    public function update(UpdateRequest $request, Category $category)
    {
        $data = $request->validated();
        $category->update($data);
        return redirect()->route('admin.category');
    }
}
