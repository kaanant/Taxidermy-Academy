<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function create(Request $request){

    }

    function destroy(Product $product){
        $product->delete();
    }

    function index(Product $product){
        $products = $product->all();
        return view('admin.product.index', ['products' => $products]);
    }
}
