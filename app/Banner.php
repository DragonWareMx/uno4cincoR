<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    public function book(){
        return $this->belongsTo('App\Book');
    }
    public function author(){
        return $this->belongsTo('App\Author');
    }
    public function blog(){
        return $this->belongsTo('App\Blog');
    }
}
