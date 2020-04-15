<?php

Route::get('/', "IndexController@index");
Route::post('user/create', 'UsersController@store');
