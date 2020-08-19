<?php

namespace Modules\Core\Entities;

class CoreModel extends Illuminate\Database\Eloquent\Model
{
    public function hasAttribute($attribute)
    {
        return array_key_exists($attribute, $this->attributes);
    }

}
