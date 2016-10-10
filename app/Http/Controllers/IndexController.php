<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

use App\Http\Requests;

class IndexController extends Controller
{
    function index(Category $categoryModel){

        $categories = $categoryModel->all();
        return view('index',['categories'=>$categories]);
    }
}
