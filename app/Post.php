<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'content', 'type', 'privacy'
    ];

    //relations -------------------------------------------
    public function user()
    {
        return $this->belongsTo(User::class);
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

    // check if auth user has liked post
    public function isAuthUserLikedPost()
    {
        return $this->likes()->where('user_id',  auth()->id())->exists();
    }

    // Follower::whereUser_id(Auth::user()->id)->whereTarget_id($user->id)
    public function isFollower($id)
    {
        return Follower::whereUser_id(Auth::user()->id)->whereTarget_id($id)->exists();

    }

    // check if post has a file
    public function withImages()
    {
        // ->extension()
        if ($this->files()->exists()) {
            foreach ($this->files as $key => $value) {
                // $ext = pathinfo($value->file, PATHINFO_EXTENSION);
                $lastDotPos = strrpos($value->file, '.');
                if (!$lastDotPos) return false;
                $extension = substr($value->file, $lastDotPos + 1);
                $allowedfileExtension = ['jpg', 'png', 'gif'];
                $check = in_array($extension, $allowedfileExtension);
                if ($check) {
                    return true;
                }
            }
        }
        return false;
    }

    public function hasMoreThanOneImage()
    {
        $count = 0;
        if ($this->files()->exists()) {
            foreach ($this->files as $key => $value) {
                // $ext = pathinfo($value->file, PATHINFO_EXTENSION);
                $lastDotPos = strrpos($value->file, '.');
                if (!$lastDotPos) return false;
                $extension = substr($value->file, $lastDotPos + 1);
                $allowedfileExtension = ['jpg', 'png', 'gif'];
                $check = in_array($extension, $allowedfileExtension);
                if ($check) {
                    $count++;
                }
            }
        }
        if ($count > 1) {
            return true;
        } else {
            return false;
        }
    }

    public function getImagePathAttribute()
    {
        if ($this->files()->exists()) {
            foreach ($this->files as $key => $value) {
                // $ext = pathinfo($value->file, PATHINFO_EXTENSION);
                $lastDotPos = strrpos($value->file, '.');
                if (!$lastDotPos) return false;
                $extension = substr($value->file, $lastDotPos + 1);
                $allowedfileExtension = ['jpg', 'png', 'gif'];
                $check = in_array($extension, $allowedfileExtension);
                if ($check) {
                    return asset('files/' . $this->id . '/' . $value->file);
                }
            }
        }
    }
    public function getImagesPathAttribute()
    {
        $array=[];
        if ($this->files()->exists()) {
            foreach ($this->files as $key => $value) {
                // $ext = pathinfo($value->file, PATHINFO_EXTENSION);
                $lastDotPos = strrpos($value->file, '.');
                if (!$lastDotPos) return false;
                $extension = substr($value->file, $lastDotPos + 1);
                $allowedfileExtension = ['jpg', 'png', 'gif'];
                $check = in_array($extension, $allowedfileExtension);
                if ($check) {
                    array_push($array, asset('files/' . $this->id . '/' . $value->file));
                    // $array[]= asset('files/' . $this->id . '/' . $value->file);
                }
            }
        }
        return $array;
    }

    public function withFiles()
    {
        return $this->files()->exists();
    }
    //relations -------------------------------------------
    public function photos()
    {
        return $this->hasMany(Photo::class);
    }
    //relations -------------------------------------------
    public function files()
    {
        return $this->hasMany(File::class);
    }
    //relations -------------------------------------------
    public function shares()
    {
        return $this->hasMany(Share::class);
    }
    //relations -------------------------------------------
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable')->whereNull('parent_id');
    }
    //relations -------------------------------------------
    public function lectures()
    {
        return $this->hasMany(Lecture::class);
    }
}
