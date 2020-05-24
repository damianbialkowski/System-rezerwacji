<?php

namespace Modules\Admin\Entities;

use Modules\Core\Entities\AuthModel;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Core\Traits\BootableTrait;

class Admin extends AuthModel
{
    use Notifiable, SoftDeletes, BootableTrait;

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

    public function role()
    {
        return $this->belongsTo(Roles::class);
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }
}
