<?php

namespace Modules\Booking\Entities;

use Modules\Cms\Entities\CmsModel;
use Modules\Cms\Scopes\ActiveScope;
use Modules\Cms\Scopes\JsonActiveScope;

class AttributeValue extends CmsModel
{
    protected $fillable = [
        'name',
        'slug',
        'attribute_id',
        'value',
        'active',
    ];

    protected static function boot()
    {
        parent::boot();
        unset(static::$globalScopes[static::class][JsonActiveScope::class]);
        static::addGlobalScope(new ActiveScope);
    }

    public function attribute()
    {
        return $this->belongsTo(Attribute::class, 'attribute_id');
    }
}
