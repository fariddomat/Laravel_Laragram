<?php

namespace App\Http\Controllers;

use App\Follower;
use App\Notifications\UserNotification;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{


    public function show($username)
    {
        if (Auth::user()->username ==$username) {
            return redirect()->route('profile');
        }
        $user=User::whereUsername($username)->first();
        if (empty($user)) {
            abort(403);
        }
        $follow=Follower::whereUser_id(Auth::user()->id)->whereTarget_id($user->id);
        // dd($user->info);
        $posts = Post::where('user_id',$user->id)->orderByDesc('id')->paginate(5);
        $authuser=User::find(Auth::user()->id);
        $userIds = $authuser->following()->get()->pluck('id');
        $userIds[] = $user->id;
        $suggestionsUsers= User::where('college_id',$user->college_id)->whereNotIn('id', $userIds)->get(6) ;
        $projects=Post::where('user_id', $user->id)->where('type','project')->orderByDesc('id')->take(5)->get();

        return view('home.user', compact('user','follow', 'suggestionsUsers', 'posts', 'projects'));
    }

    public function follow($username)
    {
        $user=User::whereUsername($username)->first();
        $me=User::find(Auth::user()->id);
        $me->following()->syncWithoutDetaching($user->id);
        $details = [
            'body' =>  $me->fullName(). ' has followed You',
            'order_id' => 101,
            'actionURL' => url("/user/".$me->username),
            'user_id'=>$me->id,
            'data'=>$me->fullName()
        ];
        $user->notify(new UserNotification($details));
        return redirect()->back();
    }
    // ...
    public function notifications()
    {
        return auth()->user()->unreadNotifications()->limit(5)->get()->toArray();
    }
    public function unfollow($username)
    {
        $user=User::whereUsername($username)->first();
        $me=User::find(Auth::user()->id);
        $me->following()->detach($user->id);
        // dd($user->info);
        $details = [
            'body' =>  $me->fullName(). ' has un-followed You',
            'order_id' => 101,
            'actionURL' => url("/user/".$me->username),
            'user_id'=>$me->id,
            'data'=>$me->fullName()
        ];
        $user->notify(new UserNotification($details));
        return redirect()->back();
    }
}
