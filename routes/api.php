<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::group(['namespace' => 'Drama'], function () {
    Route::post('/dramalink', 'IndexController@link');
    Route::post('/dramasearch', 'IndexController@search');
});

Route::group(['namespace' => 'Api'], function () {
    Route::resource('/send', 'CommonController@index');
});
