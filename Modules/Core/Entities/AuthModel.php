<?php

namespace Modules\Core\Entities;

use Illuminate\Database\Eloquent\SoftDeletes;
use Silber\Bouncer\Database\HasRolesAndAbilities;

class AuthModel extends \Illuminate\Foundation\Auth\User
{
    use SoftDeletes, HasRolesAndAbilities;
}
