<?php

namespace Modules\Cms\Entities;

class Domain extends CmsModel
{
    protected $fillable = [
        'name',
        'url',
        'options'
    ];

    protected $casts = [
        'options' => 'json'
    ];
}
