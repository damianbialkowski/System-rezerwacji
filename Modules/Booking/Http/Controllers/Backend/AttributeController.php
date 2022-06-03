<?php

namespace Modules\Booking\Http\Controllers\Backend;

use Modules\Admin\Http\Controllers\Controller as CoreController;
use Modules\Booking\Entities\Attribute;
use Modules\Booking\Entities\Hotel;
use Modules\Booking\Forms\AttributeForm;
use Modules\Booking\Http\Requests\Backend\AttributeRequest;

class AttributeController extends CoreController
{
    public function __construct()
    {
        $this->model = Attribute::class;
        $this->form = AttributeForm::class;
        $this->baseView = 'panel.attributes';
        $this->baseRoute = 'attributes';
        $this->request = AttributeRequest::class;
        $this->searchableColumns = [
            'name'
        ];
        parent::__construct();
    }
}
