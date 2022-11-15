<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'title'
    ];
    public function posts()
{
    return $this->hasMany('Post');
}

public function twoPosts()
{
    return $this->hasMany('Post')->limit(2);
}
}
