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

/*Route::get('/timeline', function () {
    return view('drama.timeline');
});*/
//
//Route::get('/send/{msg?}', 'TestController@index');

Route::group(['namespace' => 'Drama'], function () {
    Route::get('/', 'IndexController@index');
});

//Auth::routes();
//
//Route::get('/home', 'HomeController@index');
//
//Route::group(['namespace' => 'Message', 'middleware' => 'auth'], function () {
//    Route::resource('/message', 'IndexController@index');
//
//    Route::resource('/bind', 'IndexController@bind');
//
//});

/*Auth::routes();

Route::get('/home', 'HomeController@index');*/
