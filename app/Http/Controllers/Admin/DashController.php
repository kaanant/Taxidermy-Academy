<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class DashController extends Controller
{
    function dashboard(){
        return view('admin.dashboard');
    }
}