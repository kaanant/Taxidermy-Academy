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

        if($request->get('status') == 'add') {
            session()->push('cart',['id' => $product->id, 'cost' => $product->discount]);
        } else {
            $cart = session('cart');
            $i = 0;
            while ($i < count($cart) && $cart[$i]['id'] != $product->id) {
                $i++;
            }

            if ($i < count($cart)) {
                array_splice($cart, $i, 1);
                session(['cart' => $cart]);
            }
        }

        $cost = array_sum(array_map(function($item){
            return (float) $item['cost'];
        }, session('cart')));

        return ['count' => count(session('cart')), 'total_cost' => $cost];
    }

    function showcart(Product $productmodel){

        $cartdetail = session('cart') ?: [];
        $productIds = [];

        foreach ($cartdetail as $product){
            if(!array_key_exists($product['id'], $productIds)) {
                $productIds[$product['id']] = 0;
            }
            $productIds[$product['id']] += 1;
        }

        $productList = $productmodel->whereIn('id', array_keys($productIds))->get();
        return view('site/cart', compact('productList', 'productIds'));
    }
}
