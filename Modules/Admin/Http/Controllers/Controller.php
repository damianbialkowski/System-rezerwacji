<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $defaultRedirect = 'index';


    /**
     * Rewrite view method to a module scope
     * @param $view
     * @param array $data
     * @param array $mergeData
     * @return \Illuminate\Contracts\View\View
     */
    public function view($view, $data = [], $mergeData = [])
    {
        return View::make('admin::'.$view, $data, $mergeData);
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
        return Redirect::route('admin::'.$route, $parameters, $status, $headers);
    }
}
