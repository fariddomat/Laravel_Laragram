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
        'post_id', 'user_id'
    ];

    //relations -------------------------------------------
    public function posts()
    {
        return $this->belongsTo(Post::class);
    }

    //relations -------------------------------------------
    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
