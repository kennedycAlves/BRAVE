<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    function userProfile(){
        return $this->hasMany('App\User');
    }
}
