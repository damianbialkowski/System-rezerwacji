<?php

namespace Modules\Cms\Entities;

use Illuminate\Database\Eloquent\Model;

class CmsModel extends Model
{
    public function hasAttribute($attribute)
    {
        return array_key_exists($attribute, $this->attributes);
    }
}
