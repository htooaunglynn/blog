<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.category.index', ['categories' => Category::latest()->paginate(12)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formData = $request->validate([
            'name' => "required|max:255|unique:categories,name",
            'slug' => "required|unique:categories,slug"
        ], [
            'slug.unique' => 'Slug is already exists.',
            'name.unique' => 'Name is already exists.'
        ]);

        Category::create($formData);

        return redirect('/dashboard/category')->with('success', 'Category create success.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('blog.index', ['blogs' => $category->blogs]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('dashboard.category.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $formData = $request->validate([
            'name' => "required|max:255|unique:categories,name",
            'slug' => "required|unique:categories,slug"
        ], [
            'slug.unique' => 'Slug is already exists.',
            'name.unique' => 'Name is already exists.'
        ]);

        $category->update($formData);

        return redirect('/dashboard/category')->with('success', 'Category update success.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect('/dashboard/category')->with('success', 'Category delete success.');
    }
}
