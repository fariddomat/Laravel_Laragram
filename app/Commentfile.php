<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commentfile extends Model
{
    //
    protected $fillable=['comment_id','file'];

    //relations -------------------------------------------
    public function comments()
    {
        return $this->belongsTo(Comment::class, 'commentable');
    }

   
}
