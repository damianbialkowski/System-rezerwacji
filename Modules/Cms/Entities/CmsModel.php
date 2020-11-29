<?php

namespace Modules\Cms\Entities;

use Illuminate\Database\Eloquent\Model as BaseModel;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;
use Modules\Cms\Traits\CmsTrait;

abstract class CmsModel extends BaseModel implements HasMedia
{
    use HasMediaTrait,
        SoftDeletes,
        CmsTrait;

    public function hasAttribute($attribute)
    {
        return array_key_exists($attribute, $this->attributes);
    }
}
