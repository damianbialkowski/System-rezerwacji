<?php

namespace Modules\Admin\Providers;

use Maatwebsite\Sidebar\SidebarServiceProvider as BaseSidebarServiceProvider;
use Illuminate\Support\Facades\Config;

class SidebarServiceProvider extends BaseSidebarServiceProvider
{
    protected $defer = true;

    /**
     * Extended boot from Maatwebsite\Sidebar
     */
    public function boot()
    {
        // todo: only for backend panel
        $this->registerViews();
        \View::creator(
            'admin::partials.sidebar',
            '\Modules\Admin\src\Sidebar\SidebarCreator'
        );
    }

    /**
     * Register extended views from Maatwebsite\Sidebar
     *
     * @return void
     */
    public function registerViews()
    {
        $sourcePath = module_path('Admin', 'Resources/views/sidebar');

        $this->loadViewsFrom($sourcePath, 'sidebar');
    }

}