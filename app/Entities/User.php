<?php

namespace App\Entities;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;


class User extends Authenticatable
{
    use Notifiable;
use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

public $timestamps = true;
protected $table    = 'users';

    protected $fillable = [
        'cpf', 'name', 'phone','birth','gender','notes','email','password','status','permission'
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
     public function setPasswordAttribute($value){
     $this->attributes['password'] = env('PASSWORD_HASH') ? bcrypt($value) : $value;
     }
}

