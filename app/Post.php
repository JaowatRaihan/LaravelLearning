<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    //protected $guarded = [];

    use SoftDeletes;
    
    protected $dates = ['created_at']; 

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
