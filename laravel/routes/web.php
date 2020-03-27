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


Route::get('/', 'HomeController@index')->name('Home');

Route::get('/news', 'NewsController@index')->name('News');

Route::get('/news/{id}', 'NewsController@show')->name('NewsOne');

Route::get('/category', 'CategoryController@index')->name('Category');

Route::get('/category/{category_name}', 'NewsController@showNewsByCategory')->name('NewsCategory');


