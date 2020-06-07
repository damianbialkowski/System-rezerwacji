<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    protected $fillable = [
        'firstname', 'username', 'role_id', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function boot()
    {
        parent::boot();

        static::updating(function ($table) {
            $table->updated_by = Auth::id();
        });

        static::deleting(function ($table) {
            $table->deleted_by = Auth::id();
        });

        static::saving(function ($table) {
            $table->created_by = Auth::id();
        });
    }

    public function setPasswordAttribute($password)
    {
        return $this->attributes['password'] = Hash::make($password);
    }

    public function articles()
    {
        return $this->hasMany('App\Article');
    }

    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function isAdmin()
    {
        return ($this->role_id === 1) ? true : false;
    }

    public function getFirstname()
    {
        return $this->firstname;
    }

    public function getFirstnameById($id = null)
    {
        if ($id) {
            return $this->where('id', $id)->first()->firstname;
        }
    }

    public function getUsername()
    {
        return $this->username;
    }

    //while creating users from admin panel
    public function creator()
    {
        return $this->belongsTo('App\User', 'created_by', 'id')->first();
    }

    // displayig initials in admin panel
    public function initials()
    {
        return ucfirst(substr($this->firstname, 0, 1)) . '' . ucfirst(substr($this->username, 0, 1));
    }

}
