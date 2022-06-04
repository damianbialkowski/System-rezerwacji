<?php

namespace Modules\Booking\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Modules\Booking\Entities\Reservation;

class ReservationController extends Controller
{
    public function index()
    {
        if (!auth()->check()) {
            return redirect(route('Front::cms.login'));
        }
        $reservations = Reservation::where('cms_user_id', auth()->user()->id);
        if (request()->has('type')) {
            if (request()->get('type') == 'cancelled') {
                $reservations->whereNotNull('cancelled_at');
            }
        }
        return $this->view('cms.profile.reservations.index', [
            'items' => $reservations
        ]);
    }

    public function show()
    {
        if (!auth()->check()) {
            return redirect(route('Front::cms.login'));
        }
        return $this->view('cms.profile.reservations.show', []);
    }

    public function store(Request $request)
    {
        if (!auth()->check()) {
            return abort(403);
        }
        $data = $request->all();
        list($dateFrom, $dateTo) = explode(' <-> ', $data['date']);
        if (!$this->isAvailableDate($data['room_id'], $dateFrom, $dateTo)) {
            return redirect()->back()->with('error', 'Reservation is currently busy');
        }
        $data['cms_user_id'] = auth()->user()->id;
        $data['date_from'] = $dateFrom;
        $data['date_to'] = $dateTo;
        $from = \Carbon\Carbon::createFromFormat('d-m-Y', $dateFrom);
        $to = \Carbon\Carbon::createFromFormat('d-m-Y', $dateTo);

        $diffInDays = $to->diffInDays($from);
        if ($diffInDays <= 0) {
            $diffInDays = 1;
        }

        $data['total_price'] = $diffInDays * $data['cost'];
        $reservation = Reservation::create($data);
        return redirect()->back()->with('success', 'Reservation created successfully');
    }

    /**
     * @param $roomId
     * @param $dateFrom
     * @param $dateTo
     * @return bool
     */
    public function isAvailableDate($roomId, $dateFrom, $dateTo): bool
    {
        $exists = Reservation::where('room_id', $roomId)
            ->whereNull('cancelled_at')
            ->where(function ($q) use ($dateFrom, $dateTo) {
                return $q->where('date_from', $dateFrom)
                    ->orWhere('date_to', $dateTo);
            })->exists();
        return !(bool)$exists;
    }

    public function cancel()
    {

    }
}
