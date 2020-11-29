<?php

if (!function_exists('admin')) {
    function admin()
    {
        return \Auth::guard('admin')->user();
    }
}

if (!function_exists('admin_route')) {
    function admin_route($route)
    {
        return route('admin.' . $route);
    }
}
