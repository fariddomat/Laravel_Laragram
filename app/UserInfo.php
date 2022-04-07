<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class UserInfo extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = [
    //     'user_id', 'phone', 'dob', 'address', 'bio', 'profile_img', 'cover_img', 'website', 'facebook', 'twitter', 'linkedin', 'behance', 'pinterest', 'instagram', 'youtube'
    // ];

    protected $guarded=[];



    //relations -------------------------------------------
    public function users()
    {
        return $this->belongsTo(Post::class);
    }

    public function getProfileImgPathAttribute()
    {
        if ($this->profile_img == "") {
                return asset('/home/usericon.png');

        } else {
            return Storage::url('public/profile//'.$this->profile_img);
        }
    }
}

