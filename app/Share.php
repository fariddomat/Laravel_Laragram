<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Share extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'post_id', 'user_id', 'content'
    ];

    //relations -------------------------------------------
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    //relations -------------------------------------------
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
