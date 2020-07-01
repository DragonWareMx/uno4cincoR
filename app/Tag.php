<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //

    public function blogs(){
        return $this->belongsToMany('App\Blog')->withTimestamps();
    }

    public function books(){
        return $this->belongsToMany('App\Book')->withTimestamps();
    }
}
