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
protected $table = "users";
public $timestamps = true;

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
    public function groups(){
        return $this->belongsToMany(Group::Class, 'user_groups');
    }
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */

     public function moviments(){
         return $this->hasMany(Moviment::class);
     }
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = env('PASSWORD_HASH') ? bcrypt($value) : $value;
    }

     public function getFormattedCpfAttribute(){
$cpf = $this->attributes['cpf'];

return substr($cpf,0,3) . '.' . substr($cpf,3,3) . '.' . substr($cpf,7,3) . '-' . substr($cpf,-2);
     }
     public function getFormattedPhoneAttribute(){
         $phone = $this->attributes['phone'];
         return "(" . substr($phone,0,2) . ") " . substr($phone,2,4) . "-" . substr($phone,-4) ;
     }
     public function getFormattedBirthAttribute(){
         
         $birth = explode('-', $this->attributes['birth']);
     if (count($birth) != 3){
         return null;
     }else{
$birth = $birth[2]  . '/' . $birth[1] . '/' . $birth[0];
return $birth;
     }
       
     }
}

