<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class UserSocial extends Model
{
       /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    public $timestamps = true;
protected $table    = 'user_socials';


    protected $fillable = [
        'user_id', 'social_network', 'social_id','social_email','social_avatar'
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
      
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */

}

 //

