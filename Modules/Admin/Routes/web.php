<?php

Route::group(['prefix' => 'admin','as' => 'admin.'], function () {
    Route::get('/', 'DashboardController@dashboard')->name('dashboard');

    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('/login', 'Auth\LoginController@postLogin');
    Route::get('/logout', 'Auth\LoginController@logout');
    Route::resource('admins', 'AdminController');
});
