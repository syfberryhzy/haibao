<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');
    //$router->resource('/users', 'UserController');
    $router->resource('/category', 'CategoryController');
    $router->resource('/gallery', 'GalleryController');
    $router->resource('/paragraph', 'ParagraphController');
    $router->resource('/diy', 'DiyController');
    $router->resource('/template', 'TemplateController');
    $router->post('/template/checkon', 'TemplateController@checkOn');
    $router->post('/gallery/release', 'GalleryController@release');
    //$router->post('/pragraph/release', 'PragraphController@release');

});
