<?php

namespace App\Http\Controllers\Site;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;


class ProductController extends Controller
{

    function showproducts(Request $request, Category $categoryModel, Product $products){

        $categories = $categoryModel->all();

        dd($request->get('price'));

        if($request->get('category_id')){
            $products = $products->whereIn('category_id', $request->get('category_id'));
        }

        $products = $products->paginate(12);
        return view('site/show_products',['categories'=>$categories,'products'=>$products]);
    }
}
