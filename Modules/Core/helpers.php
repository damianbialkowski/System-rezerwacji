<?php

/**
 * Get module list
 */
if (!function_exists('modules')) {
    function modules()
    {
        return app('modules')->all();
    }
}

/**
 * URL to specific module assets
 */
if (!function_exists('module_asset')) {
    function module_asset($path)
    {
        $prefix = str_replace('/', '', request()->route()->getPrefix());
        return asset("modules/$prefix/$path");
    }
}

if (!function_exists('module_prefix')) {
    function module_prefix()
    {
        $prefix = str_replace('/', '', request()->route()->getPrefix());
        return $prefix;
    }
}

if (!function_exists('module_trans')) {
    function module_trans($trans)
    {
        $trans = str_replace("'", '', $trans);
        if (!strpos($trans, '::')) {
            $trans = module_prefix() . '::' . $trans;
        }
        return app('translator')->get($trans);
    }
}

/**
 * Check whether the specific module is enabled
 */
if (!function_exists('is_module_enabled')) {
    function is_module_enabled($module)
    {
        return array_key_exists($module, app('modules')->all());
    }
}

if (!function_exists('getGuardName')) {
    function getGuardName()
    {
        foreach (array_keys(config('auth.guards')) as $guard) {
            if (auth()->guard($guard)->check()) {
                return $guard;
            }
        }
        return null;
    }
}
