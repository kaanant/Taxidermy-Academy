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

        $this->validate($request, [
            'name' => 'required',
            'brand' => 'required',
            'quality' => 'required',
            'price' => 'required',
            'discount' => 'required',
            'category_id' => 'required',
            'stock' => 'required',
            'status' => 'required'
        ]);

        if (!Product::create($request->all())) {
            return redirect()->back()->withErrors('Kaydedilirken bir hata oluştu');
        }

        return redirect('admin/product/index');
    }

    function update(Product $product, Request $request){

        //dd($request->get('category_id'));
        $product->name = $request->name;
        $product->brand = $request->brand;
        $product->quality = $request->quality;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->category_id = $request->category_id;
        $product->stock = $request->stock;
        $product->status = $request->status;


        if (!$product->save()) {
          return redirect()->back()->withErrors('Kaydedilirken bir hata oluştu');
        }

        return redirect('admin/products');
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

    function search(Request $request){
        $option = $request->get('option');
        $value = $request->value;
        if($option == 'category'){
            $value = Category::where('name', 'like', '%'.$value.'%')->pluck('id');
            $product = Product::whereIn(['category_id' => $value]);
        }else {
            $product = Product::where($option, 'like', '%'.$value.'%');
        }
        return view('admin.product.index', ['products' => $product->orderBy('name')->paginate(10)]);
    }


    function index(Product $product){
        return view('admin.product.index', ['products' => $product->paginate(10)]);
    }
}
