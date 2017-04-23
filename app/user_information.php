<?php

namespace Decision_Aid;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class user_information extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;
    use Notifiable;

    protected $fillable= [
        'dob',
        'gender',
        'height',
        'weight',
        'user_id',

];


    public function user()
    {
        return $this->belongsTo('Decision_Aid\User');
    }

}
