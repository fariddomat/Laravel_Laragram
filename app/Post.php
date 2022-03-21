<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'content', 'type', 'privacy'
    ];

    //relations -------------------------------------------
    public function user()
    {
        return $this->belongsTo(User::class);

    }

    //relations -------------------------------------------
    public function likes()
    {
        return $this->hasMany(Like::class);

    }

    public function isAuthUserLikedPost(){
        return $this->likes()->where('user_id',  auth()->id())->exists();
     }
    //relations -------------------------------------------
    public function photos()
    {
        return $this->hasMany(Photo::class);

    }
    //relations -------------------------------------------
    public function files()
    {
        return $this->hasMany(File::class);

    }
    //relations -------------------------------------------
    public function shares()
    {
        return $this->hasMany(Share::class);

    }
    //relations -------------------------------------------
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable')->whereNull('parent_id');
    }
    //relations -------------------------------------------
    public function lectures()
    {
        return $this->hasMany(Lecture::class);
    }
}
