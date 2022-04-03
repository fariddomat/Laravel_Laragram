<?php

namespace App\Http\Controllers\Admin;

use App\College;
use App\Course;
use App\Http\Controllers\Controller;
use App\Post;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index()
    {
        $posts=Post::count();
        $users=User::count();
        $colleges=College::count();
        $courses=Course::count();
        return view('admin.index', compact('posts', 'users', 'colleges', 'courses'));
    }
}
