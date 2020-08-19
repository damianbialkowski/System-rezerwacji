<?php

Route::group(['prefix' => 'blog', 'as' => 'blog.'], function () {
    Route::get('/{article}', 'ArticleController@show');
});
