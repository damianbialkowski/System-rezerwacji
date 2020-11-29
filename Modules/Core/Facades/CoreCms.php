<?php

namespace Modules\Core\Facades;

use Illuminate\Support\Facades\Facade;

class CoreCms extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'core-cms';
    }
}
