<?php

namespace Modules\Core\Entities;

use Illuminate\Database\Eloquent\Model;

class CoreModel extends Model
{
    public function hasAttribute($attribute)
    {
        return (isset($this->{$attribute}));
    }

}
