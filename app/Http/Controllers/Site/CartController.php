<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Null_;


class CartController extends Controller
{
    function addProduct(Product $product, Request $request)
    {
        if(!session('cart')){
            session(['cart' => []]);
        }
        $cart = session()->get('cart');

        if($request->get('status') == 'add')
        {
            if( isset($cart[$product->id])){
                $cart[$product->id]['count']++;
            }else{
                $cart[$product->id]  = ['cost' => $product->discount ,'count'=>1];
            }
        } else {
            array_forget($cart,$product->id);
        }
        session()->put('cart',$cart);
        $cost= 0;
        $count = 0;
        foreach ($cart as $product){
            $cost += $product['cost'];
            $count += $product['count'];
        }
        return ['count' => $count, 'total_cost' => $cost];
    }

    function showcart(Product $productmodel){
        $productList = $productmodel->whereIn('id', array_keys(session('cart')))->get();
        return view('site/cart', compact('productList'));
    }
}
