<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Newsletter;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'username', 'role_id', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

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
        if($id){
            return $this->where('id',$id)->first()->firstname;
        }
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function isSubscribeNewsletter()
    {
        return (Newsletter::where('user_id',$this->id)->exists()) ? true : false;
        // return ($this->newsletter->user_id == \Auth::user()->id) ? true : false;
    }

    //while creating user from admin panel
    public function creator()
    {
        return $this->belongsTo('App\User','created_by','id')->first();
    }

    // displayig initials in admin panel
    public function initials()
    {
        return ucfirst(substr($this->firstname,0,1)).''.ucfirst(substr($this->username,0,1));
    }

}
