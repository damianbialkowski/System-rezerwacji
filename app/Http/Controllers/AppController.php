<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Artisan;

class AppController extends Controller
{
    public function configClear()
    {
        Artisan::call('config:clear');
        return 1;
    }

    public function cacheClear()
    {
        Artisan::call('cache:clear');
        return 1;
    }
}
