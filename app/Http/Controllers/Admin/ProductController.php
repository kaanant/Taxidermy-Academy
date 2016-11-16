<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{



    function create(Category $categories){
        return view('admin.product.create', ['categories' => $categories->all()]);
    }

    function store(Request $request, Product $product){
        $product->name = $request['name'];
        $product->price = $request['price'];
        $product->discount = $request['discount'];
        $product->stock = $request['stock'];
        $product->product_key = $request['key'];
        $product->brand = $request['brand'];
        $product->product_quality = $request['quality'];
        $product->category_id = $request['category'];
        //dd($product);
        $product->save();
        return redirect('admin/product/index');
    }

    function edit(Product $product, Category $categories){
        //dd($product);
        return view('admin.product.edit', ['categories' => $categories->all(), 'product' => $product]);
    }

    function destroy(Product $product){
        //dd($product);
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
