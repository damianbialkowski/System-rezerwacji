<?php

if (!function_exists('admin')) {
    function admin()
    {
        return \Auth::guard('admin')->user();
    }
}
