<?php

namespace Modules\Booking\Http\Controllers\Frontend;

use Modules\Booking\Entities\City;
use Modules\Booking\Entities\Room;

class HomeController extends Controller
{
    public function home()
    {
        $cities = City::limit(4)->get();
        $promotedOffers = Room::where('promoted', 1)->orderByDesc('id')->take(4)->get();
        return $this->view('cms.pages.home', [
            'cities' => $cities,
            'promotedOffers' => $promotedOffers
        ]);
    }
}
