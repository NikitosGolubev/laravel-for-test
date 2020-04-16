<?php

Route::get('/', "IndexController@index")->name('home');
Route::get('/login', 'IndexController@login')->middleware('guest');

Route::group(['middleware' => 'authenticated', 'prefix' => 'articles'], function () {
    Route::get('/', 'ArticlesController@index')->name('my-articles');

    Route::get('/create', 'ArticlesController@create');
    Route::post('/create', 'ArticlesController@store');

    Route::get('/{article}', 'ArticlesController@show')->name('article.show');

    Route::get('/{article}/edit', 'ArticlesController@edit');
    Route::put('/{article}/edit', 'ArticlesController@update');

    Route::delete('/{article}/delete', 'ArticlesController@destroy');
});

// delete, put, post on article entity

Route::post('user/create', 'UsersController@store');

Route::get('auth/logout', 'SimpleAuthController@logout');
Route::post('auth/login', 'SimpleAuthController@login');
