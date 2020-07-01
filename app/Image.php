<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //

    public function books(){
        return $this->belongsToMany('App\Book')->withTimestamps();
    }
}
