<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cupon extends Model
{
    public function sells(){
        return $this->hasMany('App\Sell');
    }
}
