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

    Route::resource('/admin/categories', 'CategoryController', ['except' => 'show']);
    Route::resource('/admin/products', 'ProductController', ['except' => 'show']);

    Route::get('/admin/gallery/showalbumlist','AlbumController@getList');
    Route::post('/admin/gallery/createalbum','AlbumController@postCreate');
    Route::get('/admin/gallery/deletealbum/{id}', 'AlbumController@getDelete');
    Route::delete('/admin/gallery/deletealbum/{id}', 'AlbumController@getDelete');
    Route::get('/admin/gallery/album/{id}','AlbumController@getAlbum');
    Route::get('/admin/gallery/addimage/{id}', 'ImageController@getForm');
    Route::post('/admin/gallery/addimage', 'ImageController@postAdd');
    Route::delete('/admin/gallery/deleteimage/{id}','ImageController@getDelete');


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


