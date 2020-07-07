<?php
 
namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //

    public function tags(){
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }

    public function images(){
        return $this->belongsToMany('App\Image')->withTimestamps();
    }

    public function genres(){
        return $this->belongsToMany('App\Genre')->withTimestamps();
    }

    public function authors(){
        return $this->belongsToMany('App\Author')->withTimestamps();
    }

    public function sells(){
        return $this->belongsToMany('App\Sell')->withTimestamps();
    }

    public function sello(){
        return $this->belongsTo('App\Sello');
    }
}
