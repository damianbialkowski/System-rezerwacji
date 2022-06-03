<?php

namespace Modules\Booking\Entities;

use Modules\Cms\Entities\CmsModel;
use Modules\Cms\Scopes\ActiveScope;
use Modules\Cms\Scopes\JsonActiveScope;
use Modules\Cms\src\VisitorManager\Traits\InteractsWithVisitors;

class City extends CmsModel
{
    use InteractsWithVisitors;

    protected static function boot()
    {
        parent::boot();
        unset(static::$globalScopes[static::class][JsonActiveScope::class]);
        static::addGlobalScope(new ActiveScope);
    }

    protected $fillable = [
        'name',
        'slug',
        'short_content',
        'content',
        'active',
    ];
}
