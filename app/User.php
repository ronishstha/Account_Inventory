<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;

class User extends Model implements \Illuminate\Contracts\Auth\Authenticatable
{
    use Authenticatable;
    public function customers(){
        return $this->hasMany('App\Customer');
    }

    public function sales(){
        return $this->hasMany('App\Sale');
    }

    public function payments(){
        return $this->hasMany('App\Payment');
    }
}
