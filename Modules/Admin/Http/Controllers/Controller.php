<?php

namespace Modules\Admin\Http\Controllers;

use Modules\Core\Http\Controllers\CoreController;
use CoreCms;

class Controller extends CoreController
{
    public $modulePrefix;
    public $routeWithModulePrefix;

    public function __construct()
    {
        $this->modulePrefix = strtolower(CoreCms::getModulePrefix(get_called_class()));
        $this->routeWithModulePrefix = implode('.', [$this->modulePrefix, $this->baseRoute]);
    }

}
