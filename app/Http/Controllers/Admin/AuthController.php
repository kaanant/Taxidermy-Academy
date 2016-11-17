<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    function showLogin(){
        return view('admin.login');
    }

    function login(Request $request, User $userModel){
        if($this->validate($request, [
            'email' =>'required|email',
            'password'=>'required|min:3'
        ])){
            return redirect()->back()->withErrors('Hatalı giriş');
        }

        $user = $userModel->where('email', $request->get('email'))->first();

        if(Hash::check($request->get('password'), $user->password)) {
            if ($user->isAdmin()) {
                Auth::login($user);
                return redirect(action("Admin\\DashController@index"));
            }
            else{
                return redirect()->back()->withErrors('Kullanıcı yetkili değil!');
            }
        }
        else
        {
            return redirect()->back()->withErrors('Hatalı e-posta veya şifre!');
        }
    }

    function logout(){
        auth()->logout();
        return redirect(action('Admin\\AuthController@showLogin'));
    }
}
