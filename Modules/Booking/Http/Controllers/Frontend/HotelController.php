<?php

namespace Modules\Booking\Http\Controllers\Frontend;

class HotelController extends Controller
{
    public function index()
    {
        return $this->view('booking.hotels.index', []);
    }

    public function show()
    {
        return $this->view('booking.hotels.show', []);
    }
}
