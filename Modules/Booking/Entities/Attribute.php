<?php

namespace Modules\Booking\Entities;

use Modules\Cms\Entities\CmsModel;

class Attribute extends CmsModel
{
    protected $fillable = [
        'name',
        'slug',
        'code',
        'type',
        'filter',
        'active',
    ];

    public function values()
    {
        return $this->hasMany(AttributeValue::class, 'attribute_id', 'id');
    }
}
