<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\profile;


class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'gender', 'slug', 'admins', 'userType', 'pic', 'banUser'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function profile(){
        return $this->hasOne('App\profile');
    }

    public function question(){
        return $this->hasOne('App\Question');
    }
}
