<?php

namespace Modules\Booking\Http\Controllers\Frontend;

class ReservationController extends Controller
{
    public function index()
    {
        return $this->view('cms.profile.reservations.index', []);
    }

    public function show()
    {
        return $this->view('cms.profile.reservations.show', []);
    }
}
