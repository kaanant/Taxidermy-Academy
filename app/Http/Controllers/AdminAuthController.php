<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AdminAuthController extends Controller
{
    function login(){
        return view('admin.login');
    }
}
