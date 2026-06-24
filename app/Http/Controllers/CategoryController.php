<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderByDesc('id')->get();
        return view('Category.index', compact('categories'));
    }

    public function create(){
        $category = new Category();
        return view('Category.create', compact('category'));
    }

    public function store(CategoryRequest $request){
        Category::create($request->validated());
        return redirect()->route('categories.index')->with('success', 'Categoría creada');
    }

    public function show(string $id){
        $category = Category::findOrFail($id);
        return view('Category.show', compact('category'));
    }

    public function edit(string $id){
        $category = Category::findOrFail($id);
        return view('Category.edit', compact('category'));
    }


    public function update(CategoryRequest $request, Category $category){
        $category->update($request->validated());
        return redirect()->route('categories.index')->with('success', 'Categoría actualizada');
    }

    public function destroy(string $id){
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Categoría eliminada');
    }
}
