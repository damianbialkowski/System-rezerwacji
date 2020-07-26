<?php

namespace Modules\Admin\Entities;

use Modules\Core\Entities\AuthModel;
use Illuminate\Notifications\Notifiable;
use Modules\Core\Traits\BootableTrait;

class Admin extends AuthModel
{
    use Notifiable, BootableTrait;

    protected $guard = 'admin';

    protected $fillable = [
        'name',
        'email',
        'password',
        'active',
    ];

    protected $hidden = [
        'password',
        'remember_token'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

}
