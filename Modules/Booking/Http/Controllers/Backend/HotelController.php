<?php

namespace Modules\Booking\Http\Controllers\Backend;

use Modules\Admin\Http\Controllers\Controller as CoreController;
use Modules\Booking\Entities\Hotel;
use Modules\Booking\Forms\HotelForm;
use Modules\Booking\Http\Requests\Backend\HotelRequest;

class HotelController extends CoreController
{
    public function __construct()
    {
        $this->model = Hotel::class;
        $this->form = HotelForm::class;
        $this->baseView = 'panel.hotels';
        $this->baseRoute = 'hotels';
        $this->request = HotelRequest::class;
        $this->searchableColumns = [
            'name'
        ];
        parent::__construct();
    }
}
