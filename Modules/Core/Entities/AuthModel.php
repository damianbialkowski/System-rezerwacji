<?php

namespace Modules\Core\Entities;

use \Illuminate\Foundation\Auth\User as BaseAuthUser;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Core\Traits\ModelTrait;

abstract class AuthModel extends BaseAuthUser
{
    use SoftDeletes, ModelTrait;
}
