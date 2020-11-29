<?php

Route::middleware(['auth:admin'])->group(function () {
    Route::resource('articles', 'ArticleController');
});
