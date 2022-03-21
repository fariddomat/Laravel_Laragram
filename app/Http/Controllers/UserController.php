<?php

namespace App\Http\Controllers;

use App\Follower;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{


    public function show($username)
    {
        $user=User::whereUsername($username)->first();
        $follow=Follower::whereUser_id(Auth::user()->id)->whereTarget_id($user->id);
        // dd($user->info);

        $authuser=User::find(Auth::user()->id);
        $userIds = $authuser->following()->get()->pluck('id');
        $userIds[] = $user->id;
        $suggestionsUsers= User::where('college_id',$user->id)->whereNotIn('id', $userIds)->get(6) ;
        return view('home.user', compact('user','follow', 'suggestionsUsers'));
    }

    public function follow($username)
    {
        $user=User::whereUsername($username)->first();
        $me=User::find(Auth::user()->id);
        $me->following()->syncWithoutDetaching($user->id);
        return redirect()->back();
    }
    public function unfollow($username)
    {
        $user=User::whereUsername($username)->first();
        $me=User::find(Auth::user()->id);
        $me->following()->detach($user->id);
        // dd($user->info);
        return redirect()->back();
    }
}
