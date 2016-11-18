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
Route::get('/admin', 'Admin\\AuthController@showLogin');
Route::post('/admin', 'Admin\\AuthController@login');

Route::group(['namespace' => 'Admin', 'middleware' => 'admin'], function() {


    Route::get('/admin/index', 'DashController@index');
    Route::get('/admin/orders', 'OrderController@index');
    Route::get('/admin/logout', 'AuthController@logout');

    Route::resource('/admin/categories', 'CategoryController');
    Route::resource('/admin/products', 'ProductController');

    /*Route::get('/admin/test','AlbumController@getAlbumList');
    Route::get('/admin/createalbum', 'AlbumController@getForm');
    Route::post('/createalbum', 'AlbumController@postCreate');
    Route::get('/deletealbum/{id}', 'AlbumController@getDelete');
    Route::get('/album/{id}','AlbumController@getAnAlbum');*/


});

Route::group(['namespace' => 'Site'], function(){
    
    Route::get('/index', 'IndexController@index');
    Route::get('/products','ProductController@showproducts');
    Route::get('/products/{product}','ProductController@productdetail');
    Route::get('/login','AuthController@showlogin');
    Route::post('/login','AuthController@login');
    Route::get('/register','AuthController@showregister');
    Route::post('/register','AuthController@register');
    Route::get('/logout','AuthController@logout');
    Route::put('/cart/{product}','CartController@addProduct');
    Route::get('/cartdetail','CartController@showcart');
    Route::get('/cartorder','OrderController@cartOrder');
    Route::post('/payment','OrderController@payment');

});


