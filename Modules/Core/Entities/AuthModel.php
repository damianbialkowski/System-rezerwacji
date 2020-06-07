<?php

namespace Modules\Core\Entities;

use Illuminate\Foundation\Auth\User as Authenticates;
use Illuminate\Database\Eloquent\SoftDeletes;

class AuthModel extends Authenticates
{
    use SoftDeletes;
}
