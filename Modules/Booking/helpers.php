<?php

if (!function_exists('make_offer_url')) {
    function make_offer_url($params = []): string
    {
        $data = [];
        $params = array_map('trim', $params);
        if (isset($params['city'])) {
            $data['city'] = $params['city'];
        }
        if (isset($params['hotel'])) {
            $data['hotel'] = $params['hotel'];
        }
        return route('Front::booking.offers.index') . '?' . http_build_query($data);
    }
}

if (!function_exists('get_random_offers')) {
    function get_random_offers($take = 5)
    {
        $query = \Modules\Booking\Entities\Room::inRandomOrder()->take($take);
        return $query->get();
    }
}
