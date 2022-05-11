<?php

namespace Modules\Booking\Providers;

use Modules\Core\Providers\Base\ModuleServiceProvider;
use Illuminate\Database\Eloquent\Factory;

class BookingServiceProvider extends ModuleServiceProvider
{
    /**
     * @var string $moduleName
     */
    protected $moduleName = 'Booking';

    /**
     * @var string $moduleNameLower
     */
    protected $moduleNameLower = 'booking';

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
