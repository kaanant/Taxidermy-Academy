<?php

namespace App\Http\Controllers\Site;

use App\User;
use App\Address;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    function showlogin(){
        return view("/site/login");
        
    }

    function showregister(){
        return view("/site/register");
    }
    
    function register(Request $request,User $userModel,Address $addressModel){

        $this->validate($request, [
            'name' =>'required',
            'surname' =>'required',
            'email' =>'required|email|unique:users',
            'password'=>'required|min:3|confirmed',
            'address'=>'required|min:20'
        ]);
        
        $user = $userModel->create($request->all());
        if(!$user){
            return redirect()->back()->withErrors(['registererror', 'Bir Hata Oluştu']);
        }

        auth()->login($user);
        $addressModel->address = $request->get('address');
        $addressModel->user_id = $request->user()->id;
        $addressModel->save();
        
        return redirect(action("Site\\IndexController@index"));
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
        return redirect(action("Site\\IndexController@index"));
    }
}
