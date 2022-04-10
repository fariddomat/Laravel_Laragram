<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Save extends Model
{
    //
    protected $guarded=[];
    //relations -------------------------------------------
    public function users()
    {
        return $this->belongsTo(users::class);
    }
    //relations -------------------------------------------
    public function posts()
    {
        return $this->belongsTo(Post::class);
    }
}
