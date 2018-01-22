<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login/openid/{openid}', 'PublicController@login')->name('login');

Route::get('/user/poster/create', 'PosterController@create')->name('poster.create');

Route::get('/lettres', 'LettreController@index')->name('letter.index');

Route::get('/categories/{category}', 'CategoryController@show')->name('category.show');

Route::any('/wechat', 'WeChatController@serve');

Route::get('/user', 'UserController@index')->name('user.index');