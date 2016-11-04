<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;


class CartController extends Controller
{
    function addProduct(Product $product)
    {
        /*$cart = session('cart');
        session('cart')->push($cart, $product['id']);*/

        session(['cart'=>$product['id']]);
        dd(session('cart'));
    }
}
