<?php

namespace Modules\Core\Entities;

use Illuminate\Foundation\Auth\User as Authenticates;
use Illuminate\Database\Eloquent\SoftDeletes;
use Silber\Bouncer\Database\HasRolesAndAbilities;

class AuthModel extends Authenticates
{
    use SoftDeletes, HasRolesAndAbilities;
}
