<?php

namespace Modules\Core\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Redirect;
use Modules\Core\src\FormBuilder\Traits\FormBuilderTrait;
use Illuminate\Http\Request;

class CoreController extends BaseController
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
        $dataTable = new $this->dataTable;
        return $dataTable->render($this->modulePrefix . '::' . $this->baseView . '.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $form = $this->form($this->form, [
            'method' => 'POST',
            'route' => [implode('.', [$this->routeWithModulePrefix, 'store'])]
        ]);

        return $this->view('panel.admins.create', ['form' => $form]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $rules = (new $this->requestList['store'])->rules();
        $request->validate($rules);

        (new $this->model)->create($request->all());
        return $this->redirect($this->baseRoute . '.' . $this->defaultRedirect);
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show($id)
    {
        $item = (new $this->model)->findOrFail($id);
        $view = [
            $this->baseView,
            'show'
        ];
        if (method_exists($item, 'attributesToUnset')) {
            $item->attributesToUnset();
        }

        return $this->view(implode('.', $view), compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $item = (new $this->model)->findOrFail($id);

        if (method_exists($item, 'attributesToUnset')) {
            $item->attributesToUnset();
        }
        $form = $this->form($this->form, [
            'method' => 'POST',
            'route' => [implode('.', [$this->routeWithModulePrefix, 'update']), $item->id],
            'model' => $item
        ]);

        return $this->view(implode('.', [$this->baseView, 'edit']), [
            'form' => $form,
            'item' => $item
        ]);
    }
}
