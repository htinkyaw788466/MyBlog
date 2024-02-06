<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    //a post belongto one category
    public function category(){
        return $this->belongsTo('App\Models\Category');
    }

    //post has many comment
    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }
}
