<?php

Route::get('/', "IndexController@index");
Route::post('user/create', 'UsersController@store');
Route::get('auth/logout', 'SimpleAuthController@logout');
