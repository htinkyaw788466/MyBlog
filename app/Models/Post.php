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

    public function scopeFilter($query,array $filters)
    {
        if($filters['excerpt']??false){
            $query->where('excerpt','like','%'.request('excerpt').'%');
        }

        if($filters['search']??false){
            $query->where('title','like','%'.request('search').'%')
                  ->orWhere('body','like','%'.request('search').'5')
                  ->orWhere('excerpt','like','%'.request('search').'%');
        }
    }
}
