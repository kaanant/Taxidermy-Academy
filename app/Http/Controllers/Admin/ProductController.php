<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{


    /*
     * Category_id düzeltilecek
     */
    function create(Request $request, Product $product){
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->discount = $request->input('discount');
        $product->stock = $request->input('stock');
        $product->brand = $request->input('brand');
        $product->product_quality = $request->input('quality');
        $product->category_id = $request->input('category');
        $product->product_key = "generatedkey3";
        $product->save();
        return redirect('admin/product');
    }

    function edit(Product $product, Category $categories){
        return view('admin.product.edit', ['categories' => $categories->all()]);
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
