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
        $upPrice = null;
        $downPrice = null;
        $products = $products->where('status',1);
        if($request->get('category_id')){
            $products = $products->whereIn('category_id', $request->get('category_id'));
        }

        if($request->get('price')){
            $price = explode(',',$request->get('price'));
            $downPrice = $price[0];
            $upPrice = $price[1];
            $products = $products->whereBetween('discount',$price);
        }

        $products = $products->paginate(12);
        $products->setPath($request->fullUrl());

        return view('site/show_products',compact('products', 'categories', 'upPrice', 'downPrice'));
    }
}
