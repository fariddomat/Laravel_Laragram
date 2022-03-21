<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
     //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'college_id'
    ];

    public function college()
    {
        return $this->belongsTo(College::class);
    }
    public function lectures()
    {
        return $this->hasMany(Lecture::class);
    }
}
