<?php

namespace Modules\Blog;

use Illuminate\Support\Facades\Artisan;

class Module
{
    public function __construct()
    {

    }

    public function install()
    {
        Artisan::call('module:migrate Blog');
    }
}
