<?php


namespace Modules\Core\src\FormBuilder\Facades;

use Illuminate\Support\Facades\Facade;

class FormBuilder extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'form-builder';
    }
}
