<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    function index(Category $categoryModel, Product $productModel){

        $categories = $categoryModel->all();
        $latestProducts =DB::table('products')->orderBy('updated_at','desc')->take(5)->get();
        dd($latestProducts);
        return view('index',['categories'=>$categories]);

    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function dashboard(){
        return view('admin.dashboard');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
}
