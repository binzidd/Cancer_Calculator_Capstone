<?php

namespace Decision_Aid;

use Illuminate\Database\Eloquent\Model;
use Decision_Aid\User;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\Authenticatable;


class SkinCancer extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;
    use Notifiable;

    protected $fillable = [
        'skin_option',
        'skin_body_option',
        'skin_body_moles_options',
        'skin_body_cancer_options',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('Decision_Aid\User');
    }

}
