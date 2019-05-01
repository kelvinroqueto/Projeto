<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserGroup extends Model
{
    use Notifiable;
    use SoftDeletes;
    
        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
    
    public $timestamps = true;
    
        protected $fillable = [
            'user_id', 'group_id', 'permission'
        ];
    
    
        /**
         * The attributes that should be hidden for arrays.
         *
         * @var array
         */
        protected $hidden = [
          
        ];
}
