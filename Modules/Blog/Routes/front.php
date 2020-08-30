<?php

Route::group(['prefix' => 'blog', 'as' => 'blog.'], function () {
    Route::get('/', 'FrontController@index');
    Route::get('/{category}/{article?}', 'FrontController@show');

});
