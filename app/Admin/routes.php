<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');
    $router->resource('users', UserController::class);
    $router->resource('article', ArticleController::class);
    $router->resource('category', CategoryController::class);
    $router->resource('comment', CommentController::class);
    $router->resource('links', LinksController::class);
    $router->resource('menu', MenuController::class);
    $router->resource('banner', BannerController::class);
});

