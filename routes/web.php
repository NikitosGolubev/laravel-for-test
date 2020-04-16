<?php

Route::get('/', "IndexController@index")->name('home');
Route::get('/login', 'IndexController@login')->middleware('guest');

Route::post('user/create', 'UsersController@store');

Route::get('auth/logout', 'SimpleAuthController@logout');
Route::post('auth/login', 'SimpleAuthController@login');
