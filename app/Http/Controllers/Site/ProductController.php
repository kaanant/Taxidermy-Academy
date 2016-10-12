<?php

namespace App\Http\Controllers\Site;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;


class ProductController extends Controller
{

    function showproducts(Request $request, Category $categoryModel, Product $productModel){

        $categories = $categoryModel->all();
        $products = $productModel->paginate(12);
        
        return view('site/show_products',['categories'=>$categories,'products'=>$products]);
    }
}
