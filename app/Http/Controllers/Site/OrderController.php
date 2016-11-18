<?php

namespace App\Http\Controllers\Site;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{

    function cartOrder(){

        if (!Auth::check()) {
            return redirect(action("Site\\AuthController@showlogin"));
        }
        $user = Auth::user();
        return view('site.order',compact('user'));
    }

    function payment(Request $request){

        dd($request);

        return 0;
    }

}
