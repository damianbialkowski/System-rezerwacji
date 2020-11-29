<?php

namespace Modules\Admin\Entities;

use Modules\Core\Entities\AuthModel;
use Illuminate\Notifications\Notifiable;
use Modules\Core\Traits\BootableTrait;
use \Silber\Bouncer\Database\HasRolesAndAbilities;

class Admin extends AuthModel
{
    use Notifiable, BootableTrait, HasRolesAndAbilities;

    protected $guard = 'admins';

    protected $fillable = [
        'last_name',
        'name',
        'login',
        'email',
        'password',
        'active',
        'last_login',
    ];

    protected $attributesUnset = [
        'password'
    ];

    protected $hidden = [
        'password',
        'remember_token'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'last_login',
    ];

    protected $appends = [
        'role',
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function getFilterList()
    {
        $all = self::withTrashed()->count();
        $active = self::where('active', 1)->count();
        $inactive = self::where('active', 0)->count();

        return [
            'all' => $all,
            'active' => $active,
            'inactive' => $inactive,
        ];
    }
}
