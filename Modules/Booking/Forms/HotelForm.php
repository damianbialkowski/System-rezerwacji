<?php

namespace Modules\Booking\Forms;

use Modules\Booking\Entities\City;
use Modules\Cms\Forms\BaseCmsForm;

class HotelForm extends BaseCmsForm
{
    public function buildForm()
    {
        $this->add('name');
        $this->add('slug');

        $cities = [];
        foreach (City::all() as $city) {
            $cities[$city->id] = $city->name;
        }
        $this->add('city_id', 'select', [
            'label' => trans('booking::hotels.city'),
            'choices' => $cities
        ]);

        $this->add('short_content', 'textarea');
        $this->add('content', 'textarea');

        $this->add('active', 'checkbox');

        $this->add('image', 'file');
    }
}
