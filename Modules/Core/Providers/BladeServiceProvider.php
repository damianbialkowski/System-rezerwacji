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
        $this->getmoduleLangDirective();
    }

    public function getmoduleLangDirective()
    {
        Blade::directive('modulelang', function ($expression) {
            $expression = str_replace("'", '', $expression);
            // current module prefix
            if (!strpos($expression, '::')) {
                $expression = module_prefix() . '::' . $expression;
            }
            return "<?php __('$expression'); ?>";
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
