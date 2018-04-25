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

Route::group(['namespace' => 'Test'], function() {
    Route::resource('/test', 'TestController@index');
});

Route::group(['namespace' => 'Drama'], function() {
    Route::resource('/dramalist', 'DramaController@dramaList');
    Route::resource('/bindmember', 'WeChatServiceController@bindMember');
    Route::resource('/getmemberid', 'WeChatServiceController@getMemberId');

    Route::resource('/mallindex', 'IntegralMallController@index');
    Route::resource('/malllist', 'IntegralMallController@cardOrGiftList');
    Route::resource('/my', 'IntegralMallController@myCardOrGift');
    Route::resource('/handle', 'IntegralMallController@mallHandle');
    Route::resource('/employ', 'IntegralMallController@employMessage');
    Route::resource('/detail', 'IntegralMallController@detail');
    Route::resource('/point', 'IntegralMallController@myPoint');
    Route::resource('/growth', 'IntegralMallController@growth');

    Route::resource('/login', 'BusinessCenterController@login');
    Route::resource('/scan', 'BusinessCenterController@scan');
    Route::resource('/recorda', 'BusinessCenterController@recorda');
});
