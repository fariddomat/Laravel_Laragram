<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
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
        'username', 'fname', 'lname', 'email', 'password', 'college_id', 'status', 'style'
    ];
    protected $appends=['profile_path', 'role_name'];

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
        return ucfirst($this->fname) . " " . ucfirst($this->lname);
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
            return $q->where('fname', 'like', "%$search%")->orWhere('lname', 'like', "%$search%");
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
        return $this->belongsToMany('App\User', 'followers', 'user_id', 'target_id');
    }
    //relations -------------------------------------------
    public function followers()
    {
        return $this->belongsToMany('App\User', 'followers', 'target_id', 'user_id');
    }

    // Follower::whereUser_id(Auth::user()->id)->whereTarget_id($user->id)
    public function isFollower($id)
    {
        return $this->whereUser_id(Auth::user()->id)->whereTarget_id($id);
    }


    //relations -------------------------------------------
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    //relations -------------------------------------------
    public function saves()
    {
        return $this->hasMany(Save::class);
    }

    public function isSaved($post)
    {
        return $this->saves()->where('user_id',  auth()->id())->where('post_id',$post)->exists();
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
    

    // pusher message
    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function chats()
    {
        $users1 = Auth::user()->followers()->get();
        $users2 = Auth::user()->following()->get();
        $users = $users1->merge($users2);
        return $users;
    }
    public function chat($user)
    {
        $chat1 = Message::where('user_id', Auth::id())->where('receiver_id', $user->id)->latest()->first();
        $chat2 = Message::where('receiver_id', Auth::id())->where('user_id', $user->id)->latest()->first();
        if(!$chat1){
            return $chat2;
        }
        if(!$chat2){
            return $chat1;
        }
        if ($chat1->created_at > $chat2->created_at) {
            return $chat1;
        } else {
           return $chat2;
        }
    }

    public function getProfilePathAttribute()
    {
        return $this->info->profile_img_path;
    }
    public function getRoleNameAttribute()
    {
        if ($this->roles->first()->name =='super_admin') {
            return 'Super Admin';
        }
        elseif ($this->roles->first()->name =='admin') {
            return 'Admin';
        }
        elseif ($this->roles->first()->name =='teacher') {
            return 'Dr';
        }
        else{
            return 'Student';
        }
    }
}
