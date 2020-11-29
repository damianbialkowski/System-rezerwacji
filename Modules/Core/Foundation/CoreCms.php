<?php

namespace Modules\Core\Foundation;

use Illuminate\Contracts\Container\Container;
use Illuminate\Foundation\Application;
use \Config;
use \Request;
use \Str;

class CoreCms
{
    protected $application;
    protected $request;

    public function __construct(Application $application)
    {
        $this->application = $application;
        $this->request = app('request');
        $this->prepareCms();
    }

    public function prepareCms()
    {
        $locale = app()->getLocale();
        Config::set('core.current_lang', $locale);
        Config::set('core.route_status', $this->getRouteStatus());
    }

    public function getRouteStatus()
    {
        if ($this->isBackend()) {
            return 'backend';
        }
        return 'frontend';
    }

    public function isBackend()
    {
        return Str::contains($this->request->url(), env('ADMIN_ROUTE'));
    }

    public function isFrontend()
    {
        return !$this->isBackend();
    }

    public function getModules()
    {
        return app('modules')->all();
    }

    public function getModulePrefix($class)
    {
        $explode = explode('\\', $class);
        return $explode[1];
    }
}
