<?php

namespace App\Http\Controllers;

use App\College;
use App\Post;
use App\Save;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class SaveController extends Controller
{

    public function index()
    {

        $user = User::find(Auth::user()->id);
        $userIds = $user->following()->get()->pluck('id');
        $userIds[] = $user->id;
        $posts = Post::whereHas('saves', function ($q) use ($user) {
            $q->where('user_id', $user->id);
        })->latest()->paginate(5);
        // dd($posts);
        $suggestionsUsers = User::where('college_id', $user->college_id)->whereNotIn('id', $userIds)->get(6);
        $colleges = College::all();
        $home = new HomeController;
        $news = $home->getNews();
        $projects = $home->getProjects();
        return view('home.index', compact('posts', 'suggestionsUsers', 'colleges', 'news', 'projects'));
    }

    public function save($id)
    {
        $post = Post::find($id);
        if (empty($post)) {
            abort(403);
        }
        $save = Save::firstOrCreate([
            'post_id' => $post->id,
            'user_id' => Auth::id(),
        ]);
        return redirect()->back();
    }
    public function unSave($id)
    {
        $post = Post::find($id);
        if (empty($post)) {
            abort(403);
        }
        $save = Save::where(
            'post_id',
            $post->id
        )->where(
            'user_id',
            Auth::id()
        );
        if ($save) {
            $save->delete();
        }
        return redirect()->back();
    }
}
