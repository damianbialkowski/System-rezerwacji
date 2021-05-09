<?php

namespace Modules\Blog\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The module namespace to assume when generating URLs to actions.
     *
     * @var string
     */
    protected $moduleNamespace = 'Modules\Blog\Http\Controllers';

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
//        Route::model('category', \Modules\Blog\Entities\Category::class);
//        Route::model('article', \Modules\Blog\Entities\Article::class);
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapWebRoutes();
        $this->mapFrontRoutes();
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::prefix(env('ADMIN_ROUTE', 'admin'))
            ->as('admin.')
            ->middleware('web')
            ->namespace($this->moduleNamespace)
            ->group(module_path('Blog', '/Routes/web.php'));
    }

    /**
     * Define the "front" routes for the application.
     *
     *
     * @return void
     */
    protected function mapFrontRoutes()
    {
        Route::middleware('front')
            ->namespace($this->moduleNamespace . '\Frontend')
            ->group(module_path('Blog', '/Routes/front.php'));
    }
}
