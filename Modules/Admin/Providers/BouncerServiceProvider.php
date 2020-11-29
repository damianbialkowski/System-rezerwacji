<?php

namespace Modules\Admin\Providers;

use Silber\Bouncer\BouncerServiceProvider as BaseBouncerServiceProvider;
use Silber\Bouncer\Database\Models;

class BouncerServiceProvider extends BaseBouncerServiceProvider
{

    /**
     * Get the user model from the application's auth config.
     *
     * @return string
     */
    protected function getUserModel()
    {
        $config = $this->app->make('config');

        if (is_null($provider = $config->get("auth.guards.admin.provider"))) {
            return null;
        }

        return $config->get("auth.providers.{$provider}.model");
    }

    /**
     * Set the classname of the user model to be used by Bouncer.
     *
     * @return void
     */
    protected function setUserModel()
    {
        Models::setUsersModel($this->getUserModel());
    }
}
