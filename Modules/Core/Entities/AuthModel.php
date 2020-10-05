<?php

namespace Modules\Core\Entities;

use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Core\Traits\ModelTrait;

abstract class AuthModel extends \Illuminate\Foundation\Auth\User
{
    use SoftDeletes, ModelTrait;
}
