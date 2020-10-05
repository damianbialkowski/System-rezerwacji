<?php

namespace Modules\Admin\Entities;

use Modules\Core\Entities\AuthModel;
use Illuminate\Notifications\Notifiable;
use Modules\Core\Traits\BootableTrait;
use \Silber\Bouncer\Database\HasRolesAndAbilities;

class Admin extends AuthModel
{
    use Notifiable, BootableTrait;

    protected $guard = 'admin';

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

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function showableAttributes(): array
    {
        return [
            'id',
            'name',
            'email',
            'created_at',
            'updated_at'
        ];
    }
}
