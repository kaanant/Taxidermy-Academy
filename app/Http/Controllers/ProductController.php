<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

use App\Http\Requests;

class ProductController extends Controller
{
    function create(Request $request){

    }

    function show(Product $product){
        return view('product.show', compact($product));
    }

}
