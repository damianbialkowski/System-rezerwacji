<?php

namespace Modules\Admin\Entities;

use Modules\Core\Entities\CoreModel;

class Roles extends CoreModel
{
    protected $fillable = [
        'name',
        'description',
        'permission_type',
        'permissions',
    ];

    protected $casts = [
        'permissions' => 'array'
    ];
}
