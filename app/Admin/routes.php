<?php

use Illuminate\Routing\Router;

Admin::registerHelpersRoutes();

Route::group([
    'prefix'        => config('admin.prefix'),
    'namespace'     => Admin::controllerNamespace(),
    'middleware'    => ['web', 'admin'],
], function (Router $router) {

    $router->get('/', 'HomeController@index');
    $router->get('/Example', 'ExampleController@index');
    $router->get('/ajaxGetVideoList', 'TestController@ajaxGetVideoList');
    $router->resource('test', TestController::class);
    $router->resource('dramaamerican', DramaController::class);
    $router->get('/ajaxGetDramaList', 'DramaController@ajaxGetDramaList');

});
