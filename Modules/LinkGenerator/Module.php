<?php

namespace Modules\LinkGenerator;

use Modules\Core\src\Modules\BaseModule;
use Illuminate\Support\Facades\Artisan;

class Module extends BaseModule
{
    public function __construct()
    {

    }

    public function install()
    {
        Artisan::call('module:migrate LinkGenerator');
    }
}
