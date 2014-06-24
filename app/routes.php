<?php
Route::get('/', 'PostsController@index');
Route::resource('posts', 'PostsController');
