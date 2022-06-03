<?php

namespace Modules\Booking\Providers;

use Illuminate\Support\Facades\Route;
use Modules\Core\Providers\Base\RouteServiceProvider as BaseRouteServiceProvider;

class RouteServiceProvider extends BaseRouteServiceProvider
{
    /**
     * The module namespace to assume when generating URLs to actions.
     *
     * @var string
     */
    protected string $moduleNamespace = 'Modules\Booking\Http\Controllers';
    protected string $moduleName = 'Booking';
    protected string $moduleNameLower = 'booking';

    /**
     * Called before routes are registered.
     *
     * Register any model bindings or pattern based filters.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }
}
