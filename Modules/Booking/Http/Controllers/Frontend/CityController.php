<?php

namespace Modules\Booking\Http\Controllers\Frontend;

use Modules\Booking\Entities\City;

class CityController extends Controller
{
    public function index()
    {
        return $this->view('booking.cities.index', []);
    }

    public function show(City $city)
    {
        return $this->view('booking.cities.show', [
            'item' => $city,
            'items' => []
        ]);
    }
}
