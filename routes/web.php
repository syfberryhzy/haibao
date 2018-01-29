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

Route::post('/user/poster', 'PosterController@store')->name('poster.store');

Route::get('/user/poster', 'PosterController@index')->name('poster.index');

Route::get('/user/poster/{diy}', 'PosterController@show')->name('poster.show');

Route::get('/lettres', 'LettreController@index')->name('lettre.index');

Route::get('/lettres/hot', 'LettreController@hot')->name('lettre.hot');

Route::post('/lettres/{paragraph}', 'LettreController@store')->name('lettre.store');

Route::post('/pictures/{gallery}', 'PictureController@store')->name('picture.store');

Route::get('/pictures', 'PictureController@index')->name('picture.index');

Route::get('/pictures/hot', 'PictureController@hot')->name('picture.hot');

Route::get('/pictures/new', 'PictureController@new')->name('picture.new');

Route::get('/categories/{category}/pictures', 'CategoryController@pictures')->name('category.pictures');

Route::get('/categories/{category}/lettres', 'CategoryController@lettres')->name('category.lettres');

Route::get('/categories/{category}', 'CategoryController@show')->name('category.show');

Route::any('/wechat', 'WeChatController@serve');

Route::get('/menu', 'WeChatController@menu');

Route::get('/user', 'UserController@index')->name('user.index');
