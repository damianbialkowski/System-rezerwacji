<?php

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@postLogin');

    Route::middleware(['auth.admin'])->group(function () {
        Route::get('/', 'DashboardController@dashboard')->name('dashboard');
        Route::resource('admins', 'AdminController');
        Route::get('logout', 'Auth\LoginController@logout')->name('logout');
    });
});
