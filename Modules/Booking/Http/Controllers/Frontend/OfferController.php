<?php

namespace Modules\Booking\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Modules\Booking\Entities\Attribute;
use Modules\Booking\Entities\City;
use Modules\Booking\Entities\Opinion;
use Modules\Booking\Entities\Room;

class OfferController extends Controller
{
    public function index(Request $request)
    {
        $query = Room::query();
        if ($request->has('q')) {
            $query->whereRaw('LOWER(`name`) LIKE ? ', ['%' . strtolower($request->get('q')) . '%']);
        }
        if ($request->has('city')) {
            $cityId = City::where('slug->en', $request->get('city'))->first()->id ?? -1;

            $query->whereExists(function ($q) use ($cityId) {
                $q->select(\DB::raw(1))
                    ->from('hotels')
                    ->whereRaw('hotels.city_id = ' . $cityId);
            });
        }
        if ($request->has('attr')) {
            // dd($request->get('attr'));
        }
        if ($request->has('sort') && str_contains($request->get('sort'), ':')) {
            list($column, $order) = explode(':', $request->get('sort'));
            if (!in_array($order, ['asc', 'desc'])) {
                $order = 'asc';
            }
            $query->orderBy($column, $order);
        } else {
            $query->orderByDesc('id');
        }
        $filters = Attribute::with('values');
        return $this->view('booking.offers.index', [
            'items' => $query->paginate(),
            'filters' => $filters
        ]);
    }

    public function show($slug)
    {
        $item = Room::where('slug->en', $slug)->firstOrFail();
        $this->setSeoTitle($item->name);

        return $this->view('booking.offers.show', [
            'item' => $item,
            'items' => []
        ]);
    }

    public function rating(Request $request)
    {
        $item = Room::where('id', $request->get('item_id'))->firstOrFail();
        $opinion = Opinion::create(
            [
                'entity_id' => $item->id,
                'entity_type' => get_class($item),
                'name' => $request->get('customer_name'),
                'content' => $request->get('content'),
                'rate' => $request->get('rating'),
            ]
        );
        return response()->json(['msg' => 'Success!']);
    }
}
