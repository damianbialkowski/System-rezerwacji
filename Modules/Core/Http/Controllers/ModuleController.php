<?php

namespace Modules\Core\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class ModuleController extends Controller
{

    protected $modules;

    public function initialize()
    {
        $this->modules = app('modules');
        dd($this->modules);
    }
}
