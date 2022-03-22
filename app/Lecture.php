<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'course_id', 'post_id'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
