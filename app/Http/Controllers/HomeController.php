<?php

namespace App\Http\Controllers;

use App\College;
use App\Course;
use App\Lecture;
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
    public function home(Request $request)
    {

        $user=User::find(Auth::user()->id);
        // dd($user->following()->get()->pluck('id'));
        $userIds = $user->following()->get()->pluck('id');
        $userIds[] = $user->id;
        $posts= \App\Post::whereIn('user_id', $userIds)->whereType('post')->latest()->paginate(5);
        $suggestionsUsers= User::where('college_id',$user->id)->whereNotIn('id', $userIds)->get(6) ;

        $news= $this->getNews();
        $projects= $this->getProjects();

        $colleges=College::all();
        return view('home.index', compact('posts', 'suggestionsUsers', 'colleges', 'news', 'projects'));
    }

    public function coursesList(Request $request)
    {

        $parent_id = $request->cat_id;

        $colleges = College::where('id',$parent_id)
                              ->with('courses')
                              ->get();
        return response()->json([
            'subcategories' => $colleges
        ]);
    }

    // Show news
    public function news()
    {
        $user=User::find(Auth::user()->id);
        $userIds = $user->following()->get()->pluck('id');
        $userIds[] = $user->id;
        $posts= Post::whereHas('user', function($q) use ($user){
            $q->where('college_id', $user->college_id);
        })->whereType('news')->latest()->paginate(5);
        $suggestionsUsers= User::where('college_id',$user->id)->whereNotIn('id', $userIds)->get(6) ;
        $colleges=College::all();
        $news= $this->getNews();
        $projects= $this->getProjects();
        return view('home.index', compact('posts', 'suggestionsUsers', 'colleges', 'news', 'projects'));
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
        $colleges=College::all();
        $news= $this->getNews();
        $projects= $this->getProjects();
        return view('home.index', compact('posts', 'suggestionsUsers', 'colleges', 'news', 'projects'));
    }

    // courses
    public function courses()
    {
        $user=User::find(Auth::user()->id);
        $userIds = $user->following()->get()->pluck('id');
        $userIds[] = $user->id;
        $suggestionsUsers= User::where('college_id',$user->id)->whereNotIn('id', $userIds)->get(6) ;
        $colleges=College::all();
        $courses=Course::where('college_id',$user->college->id)->get();
        return view('home.courses', compact('suggestionsUsers', 'colleges', 'courses'));
    }

    // get course lectures list
    public function course($name)
    {
        $user=User::find(Auth::user()->id);
        $userIds = $user->following()->get()->pluck('id');
        $userIds[] = $user->id;
        $suggestionsUsers= User::where('college_id',$user->id)->whereNotIn('id', $userIds)->get(6) ;
        $colleges=College::all();
        $courses=Course::where('name',$name)->first();
        $lectures=Lecture::where('course_id',$courses->id)->get();
        return view('home.course', compact('suggestionsUsers', 'colleges', 'courses', 'lectures'));
    }

    // get latest 5 news
    public function getNews()
    {
        $user=User::find(Auth::user()->id);
        $news= Post::whereHas('user', function($q) use ($user){
            $q->where('college_id', $user->college_id);
        })->whereType('news')->latest()->take(5)->get();
        return $news;
    }

    // get latest 3 project
    public function getProjects()
    {
        $user=User::find(Auth::user()->id);
        $projects= Post::whereHas('user', function($q) use ($user){
            $q->where('college_id', $user->college_id);
        })->whereType('project')->latest()->take(3)->get();
        return $projects;
    }
}
