<?php

use \Backend\DomainController;

Route::prefix('cms')->name('cms.')->group(function () {
    Route::middleware(['auth:admin'])->group(function () {
        Route::resource('domains', DomainController::class);
    });
});
