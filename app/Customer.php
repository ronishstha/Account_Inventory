<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function sales(){
        return $this->hasMany('App\Sale');
    }

    public function payments(){
        return $this->hasMany('App\Payment');
    }

    public function records(){
        return $this->hasMany('App\Record');
    }
}
