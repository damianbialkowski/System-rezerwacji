<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Settings;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        $settings_website = Settings::where('type','website')->get(['key','value']);
        $settings = [];
        foreach($settings_website as $v){
            $settings[$v->key] = $v->value;
        }

        view()->share('settings', $settings);
        if(\Auth::check()){
            view()->share('user', \Auth::user());
        }
    }
}
