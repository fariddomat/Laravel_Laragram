<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlackList extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'target_it'
    ];

    //relations -------------------------------------------
    public function users()
    {
        return $this->belongsTo(users::class);
    }
}
