<?php

namespace Modules\Booking\Http\Controllers\Frontend;

use Modules\Booking\Entities\City;

class HomeController extends Controller
{
    public function home()
    {
        $cities = City::limit(4)->get();
        return $this->view('cms.pages.home', [
            'cities' => $cities
        ]);
    }
}
