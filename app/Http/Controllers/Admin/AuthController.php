<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    function showLogin(){
        return view('admin.login');
    }

    function login(Request $request, User $userModel){
        $this->validate($request, [
            'email' =>'required|email',
            'password'=>'required|min:3'
        ]);

        $user = $userModel->where('email', $request->get('email'))->first();

        if(Hash::check($request->get('password'), $user->password))
        {
            Auth::login($user);
            return redirect(action("Site\\IndexController@index"));
        }
        else
        {
            return redirect()->back()->withErrors(trans('auth.failed'));
        }
    }

    function logout(){
        auth()->logout();
        return redirect(action('Admin\\AuthController@showLogin'));
    }
}
