<?php

Route::get('/', "IndexController@index")->name('home');
Route::get('/login', 'IndexController@login')->middleware('guest');

Route::get('/articles', 'ArticlesController@index')->middleware('authenticated')->name('my-articles');

Route::get('/articles/create', 'ArticlesController@create')->middleware('authenticated');
Route::post('/articles/create', 'ArticlesController@store')->middleware('authenticated');

Route::get('/articles/{article_id}', 'ArticlesController@show')->middleware('authenticated');
Route::get('/{user_id}/articles/edit', 'ArticlesController@edit')->middleware('authenticated');

// delete, put, post on article entity

Route::post('user/create', 'UsersController@store');

Route::get('auth/logout', 'SimpleAuthController@logout');
Route::post('auth/login', 'SimpleAuthController@login');
