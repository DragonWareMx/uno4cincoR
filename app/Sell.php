<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sell extends Model
{
    //
    public function books(){
        return $this->belongsToMany('App\Book')->withTimestamps();
    }

    
}
