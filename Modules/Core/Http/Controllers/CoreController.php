<?php

namespace Modules\Core\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Redirect;
use Modules\Core\src\FormBuilder\Traits\FormBuilderTrait;
use Illuminate\Http\Request;
use Bouncer;

abstract class CoreController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, FormBuilderTrait;

    protected $model;
    protected $defaultRedirect = 'index';

    /**
     * Rewrite view method to a module scope
     * @param $view
     * @param array $data
     * @param array $mergeData
     * @return \Illuminate\Contracts\View\View
     */
    public function view($view, $data = [], $mergeData = [])
    {
        return view(module_prefix() . '::' . $view, $data, $mergeData);
    }

    /**
     * Redirect to a specific route
     * @param $route
     * @param array $parameters
     * @param int $status
     * @param array $headers
     * @return \Illuminate\Http\RedirectResponse
     */
    public function redirect($route, $parameters = [], $status = 302, $headers = [])
    {
        return Redirect::route(module_prefix() . '.' . $route, $parameters, $status, $headers);
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        if (!Bouncer::can('index', admin())) {
            return abort(403);
        }
        $dataTable = new $this->dataTable;
        return $dataTable->render($this->modulePrefix . '::' . $this->baseView . '.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        if (!Bouncer::can('create', admin())) {
            return abort(403);
        }
        $form = $this->form($this->form, [
            'method' => 'POST',
            'route' => [implode('.', [$this->routeWithModulePrefix, 'store'])]
        ]);

        return $this->view($this->baseView . '.create', ['form' => $form]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        if (!Bouncer::can('store', admin())) {
            return abort(403);
        }
        if (count($this->requestList) && isset($this->requestList['store'])) {
            $rules = (new $this->requestList['store'])->rules();
            $request->validate($rules);
        }

        (new $this->model)->create($request->all());
        return $this->redirect($this->baseRoute . '.' . $this->defaultRedirect);
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show($id)
    {
        if (!Bouncer::can('show', admin())) {
            return abort(403);
        }
        $item = (new $this->model)->findOrFail($id);

        if (method_exists($item, 'attributesToUnset')) {
            $item->attributesToUnset();
        }

        return $this->view($this->baseView . '.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        if (!Bouncer::can('edit', admin())) {
            return abort(403);
        }
        $item = (new $this->model)->findOrFail($id);

        if (method_exists($item, 'attributesToUnset')) {
            $item->attributesToUnset();
        }
        $form = $this->form($this->form, [
            'method' => 'POST',
            'route' => [$this->routeWithModulePrefix . '.update', $item->id],
            'model' => $item
        ]);

        return $this->view($this->baseView . '.edit', compact(['item', 'form']));
    }
}
