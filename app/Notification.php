<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'link', 'user_id'
    ];

    //relations -------------------------------------------
    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
