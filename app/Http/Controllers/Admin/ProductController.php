<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function create(Request $request){

    }

    function index(Product $product){
        $products = $product->all();
        return view('admin.product.index', compact($products));
    }
}
