<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'post_id', 'parent_id', 'comment', 'commentable_id', 'commentable_type'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }

    public function posts()
      {
          return $this->belongsTo(Post::class,'commentable_id');
      }

      public function commentLikes()
    {
        return $this->hasMany(CommentLike::class);
    }
}
