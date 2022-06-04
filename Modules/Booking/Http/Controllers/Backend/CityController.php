<?php

namespace Modules\Booking\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Modules\Admin\Http\Controllers\Controller as CoreController;
use Modules\Booking\Entities\City;
use Modules\Booking\Forms\CityForm;
use Modules\Booking\Http\Requests\Backend\CityRequest;
use Bouncer;

class CityController extends CoreController
{
    public function __construct()
    {
        $this->model = City::class;
        $this->form = CityForm::class;
        $this->baseView = 'panel.cities';
        $this->baseRoute = 'cities';
        $this->request = CityRequest::class;
        $this->searchableColumns = [
            'name'
        ];
        parent::__construct();
    }

    public function update(Request $request, $id)
    {
        if (!Bouncer::can('edit', $this->model)) {
            return abort(403);
        }
        if (isset($this->request)) {
            $this->validateForm($request, new $this->request, $id);
        }
        $item = $this->model::findOrFail($id);
        $item->fill($request->all())->save();

        $item->syncFormMedia($request);

        return $this->redirect($this->routeWithModulePrefix . '.' . $this->defaultRedirect);
    }
}
