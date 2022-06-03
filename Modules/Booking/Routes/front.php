<?php

Route::get('/', [\Modules\Booking\Http\Controllers\Frontend\HomeController::class, 'home'])->name('home');
Route::resource('cities', \Modules\Booking\Http\Controllers\Frontend\CityController::class)->only(['index', 'show']);
Route::resource('offers', \Modules\Booking\Http\Controllers\Frontend\OfferController::class)->only(['index', 'show']);
Route::prefix('my-account')->group(function () {
    Route::resource('reservations', \Modules\Booking\Http\Controllers\Frontend\ReservationController::class)
        ->only(['index', 'show', 'store', 'update']);
});

Route::post('offer-rating', [
    \Modules\Booking\Http\Controllers\Frontend\OfferController::class,
    'rating'
])->name('offer_rating');
