<?php

namespace Modules\Admin\Http\Controllers;

use Modules\Core\Http\Controllers\CoreController;

class Controller extends CoreController
{
    public $modulePrefix;
    public $routeWithModulePrefix;

    public function __construct()
    {
        $this->modulePrefix = module_prefix();
        $this->routeWithModulePrefix = implode('.', [$this->modulePrefix, $this->baseRoute]);
    }

}
