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

    function store(Request $request){
        if (!Product::create($request->all())) {
            return redirect()->back()->withErrors('Kaydedilirken bir hata oluştu');
        }

        return redirect('admin/product/index');
    }

    function update(Request $request){
        // validate

        // Control success
        if (!Product::create($request->all())) {
          return redirect()->back()->withErrors('Kaydedilirken bir hata oluştu');
        }

        return redirect('admin/product/index');
    }

    function show(){
        return view('admin/products/index');
    }

    function edit(Product $product, Category $categories){
        //dd($product);
        return view('admin.product.edit', ['categories' => $categories->all(), 'product' => $product]);
    }

    function destroy(Product $product){
        //dd($product);
        if(!$product->delete()){
            return ['err' => 1];
        }
        return ['err' => 0];
    }


    function index(Product $product){
        return view('admin.product.index', ['products' => $product->paginate(10)]);
    }
}
