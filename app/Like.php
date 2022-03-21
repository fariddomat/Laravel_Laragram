<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'post_it'
    ];

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
