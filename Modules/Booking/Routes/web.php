<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use \Backend\CityController;
use \Backend\HotelController;
use \Backend\HotelRoomController;
use \Backend\AttributeController;
use \Backend\AttributeValueController;
use \Backend\ReservationController;

Route::group(['prefix' => 'booking', 'as' => 'booking.', 'middleware' => ['auth:admin']], function () {
    Route::resource('cities', CityController::class);
    Route::resource('hotels', HotelController::class);
    Route::resource('hotels.rooms', HotelRoomController::class);
    Route::resource('attributes', AttributeController::class);
    Route::resource('attributes.values', AttributeValueController::class);
    Route::resource('reservations', ReservationController::class);
});
