<?php

namespace App\Http\Controllers\Admin;

use App\Category;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function index(Category $category){
        return view('admin.category.index', ['categories' => $category->orderBy('name')->get()]);
    }

    function store(Category $category, Request $request){
        $category->name = $request->name;
        if(!$category->save()){
            return redirect()->back()->withErrors('Kaydedilirken bir hata oluştu');
        }
        return redirect('admin/categories');
    }


    function update(Category $category, Request $request){
        $category->name = $request->name;
        if(!$category->save()){
            return redirect()->back()->withErrors('Kaydedilirken bir hata oluştu');
        }
        return redirect('admin/categories');
    }

    function destroy(Category $category){
        //dd($category);
        if(!$category->delete()){
            return ['err' => 1];
        }
        return ['err' => 0];
    }

    function create(){
        return view('admin.category.create');
    }

    function edit(Category $category){
        return view('admin.category.edit', ['category' => $category]);
    }
}
