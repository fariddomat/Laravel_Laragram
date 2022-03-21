<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class College extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    protected $withCount = ['users'];

    //relations -------------------------------------------
    public function users()
    {
        return $this->hasMany(User::class);

    }

    //relations -------------------------------------------
    public function courses()
    {
        return $this->hasMany(Course::class);

    }
}
