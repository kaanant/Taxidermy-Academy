<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function create(Request $request, Product $product){
        $product = [
            'name' => $request->name,

        ];
        $product->save();
        return redirect('admin.product.index');
    }

    function edit(Product $product){
        return view('admin.product.edit');
    }

    function destroy(Product $product){
        dd($product);
        $product->delete();
        return Redirect('admin.product.index');
    }

    function show(Product $product){
        return "why";
    }

    function index(Product $product){
        return view('admin.product.index', ['products' => $product->all()]);
    }
}
