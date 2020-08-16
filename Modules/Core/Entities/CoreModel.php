<?php

namespace Modules\Core\Entities;

class CoreModel extends Illuminate\Database\Eloquent\Model
{
    public function hasAttribute($attribute)
    {
        return (isset($this->{$attribute}));
    }

}
