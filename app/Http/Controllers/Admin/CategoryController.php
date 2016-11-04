<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    function index(Category $category){
        return view('admin.category.index', ['categories' => $category->all()]);
    }

    function destroy(){

    }

    function create(){

    }

    function edit(){

    }
}
