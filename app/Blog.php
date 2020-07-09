<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    //

    public function tags(){
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }
    public function author(){
        return $this->belongsTo('App\Author');
    }
}
