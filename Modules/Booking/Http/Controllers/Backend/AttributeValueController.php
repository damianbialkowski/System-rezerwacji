<?php

namespace Modules\Booking\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Modules\Admin\Http\Controllers\Controller as CoreController;
use Modules\Booking\Entities\AttributeValue;
use Modules\Booking\Forms\AttributeValueForm;
use Modules\Booking\Http\Requests\Backend\AttributeRequest;
use Bouncer;

class AttributeValueController extends CoreController
{
    public function __construct()
    {
        $this->model = AttributeValue::class;
        $this->form = AttributeValueForm::class;
        $this->baseView = 'panel.attributes.values';
        $this->baseRoute = 'attributes';
        $this->request = AttributeRequest::class;
        $this->searchableColumns = [
            'name'
        ];
        parent::__construct();
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id): object
    {
        if (!Bouncer::can('edit', $this->model)) {
            return abort(403);
        }
        $item = $this->model::withTrashed()->findOrFail($id);

        if (method_exists($item, 'attributesToUnset')) {
            $item->attributesToUnset();
        }

        $form = $this->form($this->form, [
            'method' => 'PUT',
            'route' => [$this->routeWithModulePrefix . '.update', $item->id],
            'model' => $item
        ]);

        $entity = new $this->model;
        return $this->view($this->baseView . '.edit', compact(['item', 'form', 'entity']));
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

        return $this->redirect($this->routeWithModulePrefix . '.' . $this->defaultRedirect, [
            'hotel' => $item->hotel_id
        ]);
    }
}
