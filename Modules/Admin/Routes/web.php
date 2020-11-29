<?php

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@postLogin');

Route::middleware(['auth:admin'])->group(function () {
    Route::get('/', 'DashboardController@dashboard')->name('dashboard');
    Route::get('logout', 'Auth\LoginController@logout')->name('logout');
    Route::resource('admins', 'AdminController');
    Route::resource('roles', 'RoleController');
});

