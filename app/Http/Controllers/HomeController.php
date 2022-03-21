<?php

namespace App\Http\Controllers;

use App\College;
use App\Course;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }



    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }


    /**
     * Get feed for the provided user
     * that means, only show the posts from the users that the current user follows.
     *
     * @param User $user                            The user that you're trying get the feed to
     * @return \Illuminate\Database\Query\Builder   The latest posts
     */
    public function home()
    {
        $user=User::find(Auth::user()->id);
        // dd($user->following()->get()->pluck('id'));
        $userIds = $user->following()->get()->pluck('id');
        $userIds[] = $user->id;
        $posts= \App\Post::whereIn('user_id', $userIds)->latest()->whereType('post')->paginate(5);
        $suggestionsUsers= User::where('college_id',$user->id)->whereNotIn('id', $userIds)->get(6) ;

        $colleges=College::all();
        return view('home.index', compact('posts', 'suggestionsUsers', 'colleges'));
    }

    public function courses(Request $request)
    {

        $parent_id = $request->cat_id;

        $colleges = College::where('id',$parent_id)
                              ->with('courses')
                              ->get();
        return response()->json([
            'subcategories' => $colleges
        ]);
    }

    // Shwo news
    public function news()
    {
        $user=User::find(Auth::user()->id);
        $userIds = $user->following()->get()->pluck('id');
        $userIds[] = $user->id;
        $posts= Post::whereHas('user', function($q) use ($user){
            $q->where('college_id', $user->college_id);
        })->whereType('news')->latest()->paginate(5);
        $suggestionsUsers= User::where('college_id',$user->id)->whereNotIn('id', $userIds)->get(6) ;
        return view('home.index', compact('posts', 'suggestionsUsers'));
    }

    // Projects
    public function projects()
    {
        $user=User::find(Auth::user()->id);
        $userIds = $user->following()->get()->pluck('id');
        $userIds[] = $user->id;
        $posts= Post::whereHas('user', function($q) use ($user){
            $q->where('college_id', $user->college_id);
        })->whereType('project')->latest()->paginate(5);
        $suggestionsUsers= User::where('college_id',$user->id)->whereNotIn('id', $userIds)->get(6) ;
        return view('home.index', compact('posts', 'suggestionsUsers'));
    }
}
