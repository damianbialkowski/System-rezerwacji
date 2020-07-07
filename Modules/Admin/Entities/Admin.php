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
        'role_id'
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

    public function role()
    {
        return $this->belongsTo(Roles::class);
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }
}
