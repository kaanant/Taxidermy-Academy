<?php

namespace App\Http\Controllers\Admin;

use App\Category;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function index(Category $category){
        return view('admin.category.index', ['categories' => $category->all()]);
    }

    function store(Category $category, Request $request){
        $category->name = $request->name;
        $category->save();
        return redirect('admin/categories/index');
    }

    function update(Category $category, Request $request){
        $category->name = $request->name;
        $category->save();
        return redirect('admin/categories/index');
    }

    function destroy(Category $category){
        dd($category);
    }

    function create(){
        return view('admin.category.create');
    }

    function edit(Category $category){
        return view('admin.category.edit', ['category' => $category]);
    }
}
