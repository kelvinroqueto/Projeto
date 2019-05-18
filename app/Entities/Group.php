<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Group.
 *
 * @package namespace App\Entities;
 */
class Group extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','user_id','institution_id'];

    // a classe grupo pertence ao usuario atraves do metodo owner 
    // um para muitos (pertence)

    public function getTotalValueAttribute(){
return $this->moviments()->applications()->sum('value') - $this->moviments()->outflows()->sum('value');
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function users(){
        return $this->belongsToMany(User::Class, 'user_groups');
    }

    public function institution(){
        return $this->belongsTo(Institution::class);
    }

    public function products(){
        return $this->hasMany(Product::class);
    }
    public function moviments(){
        return $this->hasMany(Moviment::class);
    }

}
