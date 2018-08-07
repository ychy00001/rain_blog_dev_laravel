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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::prefix('category')->group(function () {
    Route::get('list', 'Api\CategoryController@categories');
});

Route::prefix('menu')->group(function () {
    Route::get('list', 'Api\MenuController@menuList');
});

Route::prefix('article')->group(function () {
    Route::get('list', 'Api\ArticleController@articleList');
    Route::get('recommend-list', 'Api\ArticleController@articleRecommendList');
    Route::get('latest-list', 'Api\ArticleController@articleLatestList');
    Route::get('detail', 'Api\ArticleController@articleDetail');
});

Route::prefix('banner')->group(function () {
    Route::get('list', 'Api\BannerController@bannerList');
});

Route::prefix('upload')->group(function () {
    Route::get('image', 'Api\UploadController@uploadImg');
});

Route::prefix('tools')->group(function () {
    Route::get('format-img-curve', 'Api\ToolsController@formatImgCurveForPoint');
});
