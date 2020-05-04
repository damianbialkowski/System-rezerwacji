<?php

Route::prefix('admin')->group(function ($d) {
    Route::get('/', 'AdminController@index');

    Route::get('/login', 'Auth\LoginController@showLoginForm');
});
