<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use App\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    //

    public function reportPost($id)
    {
        $post = Post::find($id);
        if($post){
            $report=Report::create([
                'user_id'=>Auth::user()->id,
                'post_id'=>$id,

            ]);
            $report->save();
            return back();

        }else {
            return redirect()->route('404');

        }

    }

    public function reportComment($id)
    {
        $comment = Comment::find($id);
        if($comment){
            $report=Report::create([
                'user_id'=>Auth::user()->id,
                'post_id'=>$comment->posts->id,
                'comment_id' =>$id,
            ]);
            $report->save();
            return back();

        }else {
            return redirect()->route('404');

        }
    }
}
