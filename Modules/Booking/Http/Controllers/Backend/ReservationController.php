<?php

namespace Modules\Booking\Http\Controllers\Backend;

use Modules\Admin\Http\Controllers\Controller as CoreController;
use Modules\Booking\Entities\Reservation;
use Modules\Booking\Forms\ReservationForm;
use Modules\Booking\Http\Requests\Backend\ReservationRequest;

class ReservationController extends CoreController
{
    public function __construct()
    {
        $this->model = Reservation::class;
        $this->form = ReservationForm::class;
        $this->baseView = 'panel.reservations';
        $this->baseRoute = 'reservations';
        $this->request = ReservationRequest::class;
        parent::__construct();
    }
}
