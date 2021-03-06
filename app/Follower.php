<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'target_id'
    ];

    //relations -------------------------------------------
    public function users()
    {
        return $this->belongsTo(users::class);
    }
}
