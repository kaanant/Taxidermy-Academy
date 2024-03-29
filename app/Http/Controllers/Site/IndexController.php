<?php

namespace App\Http\Controllers\Site;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    function index(Product $productModel, Request $request)
    {

        $latestProducts = $productModel->where('status', 1)->orderBy('updated_at', 'desc')->take(3)->get();
        $discountedProducts = $productModel->whereColumn('discount', '<', 'price')->where('status', 1)->orderBy('discount')->take(8)->get();

        return view('site/index', [
            'latest_products' => $latestProducts,
            'discounted_products' => $discountedProducts
        ]);
    }
}
