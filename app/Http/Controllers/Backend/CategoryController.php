<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Post;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{

    public function index()
    {
        $category = Category::all();
        return view('backend.category.index', compact('category'));
    }

    public function create()
    {
        return view('backend.category.create');
    }

    public function store(CategoryRequest $request)
    {
        Category::create($request->all());
        return redirect ('admin/category')->with('status', 'Category Create Successfully!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $cat = Category::findOrFail($id);
        return view('backend.category.edit', compact('cat'));
    }

    public function update(CategoryRequest $request, $id)
    {
        Category::findOrFail($id)->update($request->all());
        return redirect('admin/category')->with('status', 'Updated Category Successfully!');
    }

    public function destroy($id)
    {
        Category::findOrFail($id)->delete();
        return redirect ('admin/category')->with('status', 'Deleted Category Successfully!');
    }
}
