<?php

namespace Modules\Booking\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Modules\Admin\Http\Controllers\Controller as CoreController;
use Modules\Booking\Entities\Hotel;
use Modules\Booking\Entities\Room;
use Modules\Booking\Forms\RoomForm;
use Bouncer;
use Modules\Booking\Http\Requests\Backend\HotelRoomRequest;

class HotelRoomController extends CoreController
{
    public function __construct()
    {
        $this->model = Room::class;
        $this->form = RoomForm::class;
        $this->baseView = 'panel.hotels.rooms';
        $this->baseRoute = 'hotels';
        $this->request = HotelRoomRequest::class;
        $this->searchableColumns = [
            'name'
        ];
        parent::__construct();
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create(): object
    {
        if (!Bouncer::can('create', $this->model)) {
            return abort(403);
        }
        $hotel = Hotel::findOrFail(request()->route('hotel'));
        if (!Bouncer::can('create', $hotel)) {
            return abort(403);
        }
        $form = $this->form($this->form, [
            'method' => 'POST',
            'url' => route($this->routeWithModulePrefix . '.' . 'store', ['hotel' => 1])
        ]);

        $item = new $this->model;
        return $this->view($this->baseView . '.create', ['form' => $form, 'item' => $item]);
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
            'route' => [
                $this->routeWithModulePrefix . '.update',
                ['hotel' => $item->id, 'room' => request()->route('room')]
            ],
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
