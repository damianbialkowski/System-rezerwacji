<?php

namespace Modules\Core\Foundation;

use Illuminate\Foundation\Application as BaseApplication;
use \Config;
use \Request;
use \Str;
use \Auth;

class Application
{
    protected object $app;
    protected $request;
    const VERSION = 0.1;
    const AUTHOR = 'Damian Białkowski';

    public function __construct(
        BaseApplication $app
    )
    {
        $this->app = $app;
        $this->request = $app->request;
        $this->initBase();
    }

    public function initBase()
    {
        Config::set('core.route_status', $this->getRouteStatus());
    }

    public function getRouteStatus(): string
    {
        if ($this->isBackend()) {
            return 'backend';
        }
        return 'frontend';
    }

    public function isBackend()
    {
        return Str::contains($this->request->url(), env('ADMIN_ROUTE', 'admin'));
    }

    public function isFrontend(): bool
    {
        return !$this->isBackend();
    }

    public function getModules()
    {
        return app('modules')->all();
    }

    public function getActiveModules()
    {
        return app('modules')->allEnabled();
    }

    public function getModulePrefix($class): string
    {
        $explode = explode('\\', $class);
        return $explode[1];
    }

    public static function getVersion(): string
    {
        return self::VERSION;
    }

    public static function getAuthor(): string
    {
        return self::AUTHOR;
    }
}
