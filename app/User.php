<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'fname', 'lname', 'email', 'password', 'college_id'
    ];

    protected $withCount = ['posts'];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function fullName()
    {
        return ucfirst($this->fname) ." " . ucfirst($this->lname);
    }

    public function scopeWhereRole($query, $role_name)
    {
        return $query->whereHas('roles', function ($q) use ($role_name) {
            return $q->whereIn('name', (array)$role_name)
                ->orWhereIn('id', (array)$role_name);
        });
    }
    public function scopeWhereRoleNot($query, $role_name)
    {
        return $query->whereHas('roles', function ($q) use ($role_name) {
            return $q->whereNotIn('name', (array)$role_name)
                ->WhereNotIn('id', (array)$role_name);
        });
    }
    public function scopeWhenSearch($query, $search)
    {
        return $query->when($search, function ($q) use ($search) {
            return $q->where('name', 'like', "%$search%");
        });
    }

    public function scopeWhenRole($query, $role_id)
    {
        return $query->when($role_id, function ($q) use ($role_id) {
            return $this->scopeWhereRole($q, $role_id);
        });
    }

    //User info -------------------------------------------
    public function info()
    {
        return $this->hasOne(UserInfo::class);
    }

    //relations -------------------------------------------
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    //relations -------------------------------------------
    public function college()
    {
        return $this->belongsTo(College::class);
    }



    //relations -------------------------------------------
    public function following()
    {
        return $this->belongsToMany('App\User','followers','user_id','target_id');
    }
    //relations -------------------------------------------
    public function followers()
{
    return $this->belongsToMany('App\User','followers','target_id','user_id');
}

    //relations -------------------------------------------
    public function blacklists()
    {
        return $this->hasMany(BlackList::class);
    }
    //relations -------------------------------------------
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    //relations -------------------------------------------
    public function shares()
    {
        return $this->hasMany(Share::class);
    }
    //relations -------------------------------------------
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    //relations -------------------------------------------
    public function commentLikes()
    {
        return $this->hasMany(CommentLike::class);
    }

    // pusher message
    public function messages()
    {
        return $this->hasMany(Message::class);
    }    

}
