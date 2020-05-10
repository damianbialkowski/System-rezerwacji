<?php

namespace Modules\Admin\Entities;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Admin extends Authenticatable
{
    use Notifiable, SoftDeletes;

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

    public static function boot()
    {
        parent::boot();

        static::updating(function($table) {
            $table->updated_by = Auth::id();
        });

        static::deleting(function($table) {
            $table->deleted_by = Auth::id();
        });

        static::saving(function($table) {
            $table->created_by = 1;
            $table->updated_by = 1;
            $table->active = 1;
        });
    }

    public function role()
    {
        return $this->belongsTo(Roles::class);
    }

    public function setPasswordAttribute($password)
    {
        if ($password != '') {
            $this->attributes['password'] = bcrypt($password);
        }
    }
}
