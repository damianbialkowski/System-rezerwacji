<?php


namespace Modules\Core\src\FormBuilder\Traits;


trait FormBuilderTrait
{
    protected function form($name, array $options = [], array $data = [])
    {
        return \App::make('laravel-form-builder')->create($name, $options, $data);
    }
}
