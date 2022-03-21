<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'post_id', 'file'
    ];

    //relations -------------------------------------------
    public function posts()
    {
        return $this->belongsTo(Post::class);
    }
}
