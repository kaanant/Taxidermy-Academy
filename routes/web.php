<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


Route::group(['namespace' => 'Admin'], function() {
    Route::get('/admin', 'AuthController@login');
    Route::get('/admin/index', 'DashController@dashboard');

    Route::resource('/admin/products', 'ProductController');
});

Route::group(['namespace' => 'Site'], function(){
    
    Route::get('/index', 'IndexController@index');

});


