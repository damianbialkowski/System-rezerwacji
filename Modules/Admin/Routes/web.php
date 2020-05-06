<?php

Route::prefix('admin')->group(function ($d) {
    Route::get('/', 'DashboardController@dashboard');

    Route::get('/login', 'Auth\LoginController@showLoginForm');
});
