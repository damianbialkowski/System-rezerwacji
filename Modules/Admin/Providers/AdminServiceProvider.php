<?php

namespace Modules\Admin\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;
use Maatwebsite\Sidebar\SidebarServiceProvider;
use Modules\Admin\Entities\Admin;
use Silber\Bouncer\Bouncer;
use Illuminate\Container\Container;

class AdminServiceProvider extends ServiceProvider
{
    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
        $this->registerFactories();
        $this->loadMigrationsFrom(module_path('Admin', 'Database/Migrations'));

        $this->registerMiddlewares();
        $this->registerHelpers();

        if (config('core.route_status') == 'backend') {
            $this->app->register('Modules\Admin\Providers\SidebarServiceProvider');
        }

    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
        $this->app->register(RepositoryServiceProvider::class);
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            module_path('Admin', 'Config/config.php') => config_path('admins.php'),
        ], 'config');
        $this->mergeConfigFrom(
            module_path('Admin', 'Config/config.php'), 'admin'
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/modules/admin');

        $sourcePath = module_path('Admin', 'Resources/views');

        $this->publishes([
            $sourcePath => $viewPath
        ], 'views');

        $this->loadViewsFrom(array_merge(array_map(function ($path) {
            return $path . '/modules/admin';
        }, \Config::get('view.paths')), [$sourcePath]), 'admin');
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = resource_path('lang/modules/admin');

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'admin');
        } else {
            $this->loadTranslationsFrom(module_path('Admin', 'Resources/lang'), 'admin');
        }
    }

    /**
     * Register an additional directory of factories.
     *
     * @return void
     */
    public function registerFactories()
    {
        if (!app()->environment('production') && $this->app->runningInConsole()) {
            app(Factory::class)->load(module_path('Admin', 'Database/factories'));
        }
    }

    /**
     * DCms
     * Register middleware list
     *
     * @return void
     */
    public function registerMiddlewares()
    {
        $router = $this->app['router'];
        $middlewares = config('admin.middlewares');
        if (is_array($middlewares)) {
            foreach ($middlewares as $alias => $namespace) {
                $router->aliasMiddleware($alias, $namespace);
            }
        }
    }

    public function registerHelpers()
    {
        $files_path = module_path('admin', 'Helpers/*.php');

        foreach (glob($files_path) as $file) {
            require_once $file;
        }
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
