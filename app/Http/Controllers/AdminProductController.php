<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

use App\Http\Requests;

class AdminProductController extends Controller
{
    function create(Request $request){

    }

    function index(Product $product){
        $products = $product->all();
        return view('admin.product.index', compact($products));
    }
}
