<?php

namespace App\Http\Controllers\Site;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    function index(Category $categoryModel, Product $productModel){

        $categories = $categoryModel->all();
        $latestProducts =DB::table('products')->orderBy('updated_at','desc')->take(3)->get();

        return view('site/index',
            ['categories'=>$categories, 
             'latest_products'=>$latestProducts]);
    }
}
