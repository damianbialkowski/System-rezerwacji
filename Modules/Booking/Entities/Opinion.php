<?php

namespace Modules\Booking\Entities;

use Modules\Core\Entities\CoreModel;

class Opinion extends CoreModel
{
    protected $fillable = [
        'entity_id',
        'entity_type',
        'name',
        'content',
        'rate'
    ];
}
