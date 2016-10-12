<?php

namespace App\Http\Controllers\Site;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;


class ProductController extends Controller
{

    function showproducts(Category $categoryModel){
        $categories = $categoryModel->all();
        return(view('site/show_products',['categories'=>$categories])
        );
    }
}
