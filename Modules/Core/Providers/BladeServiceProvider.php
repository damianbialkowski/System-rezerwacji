<?php

namespace Modules\Core\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider
{

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerAppDirectives();
    }

    public function registerAppDirectives()
    {
        Blade::directive('modulelang', function ($expression) {
            return "<?php echo module_trans({$expression}); ?>";
        });

        Blade::directive('route', function ($expression) {
            return "<?php echo route({$expression}); ?>";
        });
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
