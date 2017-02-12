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
Route::get('/', 'MainController@index');

Route::group(['middleware' => 'CheckUser'], function(){
    Route::any('home', function (){
        return view('home.index');
    });
});
Route::any('loginProcess','LoginController@loginProcess');
Route::get('hello', 'HelloController@index');
Route::post('submitted', 'TextController@submitted');
Route::get('post/list', 'TextController@post_list');
Route::get('login', 'LoginController@login');
Route::get('logout', 'LoginController@logout');

Route::get('/admin/product/new', 'ProductController@newProduct');
Route::get('/admin/products', 'ProductController@index');
Route::get('/admin/product/destroy/{id}', 'ProductController@destroy');
Route::post('/admin/product/save', 'ProductController@add');

Route::get('email',function (){
    return view('email.index');
});

Route::post('/signIn', 'EmailController@signIn');
Route::post('/emailAdmin', 'EmailController@admin');
Route::group(['middleware' => 'CheckEmailAdmin'], function(){
    Route::any('/back', 'EmailController@back');
});
Route::get('/excel', 'EmailController@excel');
Route::get('/logoutEmailAdmin', 'EmailController@emailAdminLogout');