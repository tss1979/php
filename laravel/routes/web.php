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
    'as' => 'admin.',
    'middleware' => ['auth', 'is_admin']
], function () {
    Route::get('/', 'NewsController@index')->name('index');
    Route::match(['get', 'post'],'/create', 'NewsController@create')->name('create');
    Route::get('/edit/{news}', 'NewsController@edit')->name('edit');
    Route::post('/store/{news}', 'NewsController@store')->name('store');
    Route::get('/destroy/{news}', 'NewsController@destroy')->name('destroy');
    Route::group([
        'as'=> 'profile.'
    ], function () {
        Route::get('/users', 'ProfileController@index')->name('index');
        Route::get('/profile/change/{user}', 'ProfileController@change_admin_status')->name('change_admin_status');
        Route::get('/edit', 'ProfileController@edit')->name('edit');
        Route::match(['get','post'], '/update', 'ProfileController@update')->name('update');

    });
    Route::group([
        'as'=> 'category.'
    ], function () {
        Route::get('/category', 'CategoryController@index')->name('index');
        Route::match(['get', 'post'],'/category/create', 'CategoryController@create')->name('create');
        Route::get('/category/edit/{category}', 'CategoryController@edit')->name('edit');
        Route::post('/category/change/{category}', 'CategoryController@change')->name('change');
        Route::get('/category/destroy/{category}', 'CategoryController@destroy')->name('destroy');
    });
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

Route::group([
    'prefix' => 'user',
    'as'=> 'user.'
], function () {
    Route::get('/edit', 'ProfileController@edit')->name('edit');
    Route::match(['get','post'], '/update', 'ProfileController@update')->name('update');

});



Route::get('/', 'HomeController@index',['middleware' => ['auth']])->name('Home');



Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
