<?php

use \Backend\ArticleController;
use \Backend\CategoryController;

Route::prefix('blog')->name('blog.')->group(function () {
    Route::middleware(['auth:admin'])->group(function () {
        Route::resource('articles', ArticleController::class);
        Route::resource('categories', CategoryController::class);
    });
});
