<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| WECHAT Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::prefix('official')->group(function () {
    Route::get('card-create', 'WeChat\OfficialController@createCard');
    Route::get('card-create-qr', 'WeChat\OfficialController@createCardQr');
    Route::get('card-get-qr', 'WeChat\OfficialController@getCardQr');
    Route::get('card-set-white', 'WeChat\OfficialController@setWhiteList');
    Route::get('card-info', 'WeChat\OfficialController@getCardInfo');
    Route::get('card-consume', 'WeChat\OfficialController@cardConsume');
});

Route::prefix('oauth')->group(function () {
    Route::get('oauth', 'WeChat\OauthController@oauth');
    Route::get('callback', 'WeChat\OauthController@callback');
});
//'wechat.oauth:fake'
Route::group(['prefix' => 'test'], function () {
    Route::get('h5', 'WeChat\TestOauthController@testH5Oauth');
});
