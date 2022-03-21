<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'phone', 'dob', 'address', 'bio', 'profile_img', 'cover_img', 'website', 'facebook', 'twitter', 'linkedin', 'behance', 'pinterest', 'instagram', 'youtube'
    ];



    //relations -------------------------------------------
    public function users()
    {
        return $this->belongsTo(Post::class);
    }
}

