<?php

namespace Decision_Aid;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent;
use Decision_Aid\SkinCancer;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //onetoone
    public function user_informations()
    {
        return $this->hasOne('Decision_Aid\user_information','user_id');   //one to one relationship
    }
  //many to many
    public function roles(){
        return $this->belongsToMany('Decision_Aid\Role')->withPivot('created_at');
    }

    //one to many

    public function skincancer()
    {
        return $this->hasOne('Decision_Aid\SkinCancer', 'id');
    }
}
