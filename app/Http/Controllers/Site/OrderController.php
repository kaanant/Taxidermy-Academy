<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    function cartOrder(){

        if (!Auth::check()) {
            return redirect(action("Site\\AuthController@showlogin"));
        }

        return view('site.order');
    }

}
