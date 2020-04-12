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
Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'as' => 'admin.'
], function () {
    Route::get('/', 'NewsController@index')->name('index');
    Route::match(['get', 'post'],'/create', 'NewsController@create')->name('create');
    Route::get('/edit/{news}', 'NewsController@edit')->name('edit');
    Route::post('/update/{news}', 'NewsController@update')->name('update');
    Route::get('/destroy/{news}', 'NewsController@destroy')->name('destroy');
    });

Route::group([
    'prefix' => 'news',
    'as' => 'news.'
], function () {
    Route::get('/', 'NewsController@index')->name('index');
    Route::get('/one/{news}', 'NewsController@show')->name('show');
    Route::group([
        'as'=> 'category.'
    ], function () {
        Route::get('/category', 'CategoryController@index')->name('index');
        Route::get('/category/{category_name}', 'NewsController@showNewsByCategory')->name('show');
    });
});

Route::get('/', 'HomeController@index')->name('Home');



Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
