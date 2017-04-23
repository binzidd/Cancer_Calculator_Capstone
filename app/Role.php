<?php

namespace Decision_Aid;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //inverse for Users

    protected $fillable = [
        'name'];

    public function users()
    {
        return $this->belongsToMany('\Decision_Aid\User');
    }
}
