<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $comment = new Comment();
        // $comment = new Comment();
        $comment->comment = $request->comment;

        $comment->user()->associate($request->user());

        $post = Post::find($request->post_id);

        $post->comments()->save($comment);
        return back();
    }

    public function replyStore(Request $request)
    {
        $reply = new Comment();

        $reply->comment = $request->get('comment');

        $reply->user()->associate($request->user());

        $reply->parent_id = $request->get('comment_id');
        // dd($reply->parent_id);

        $post = Post::find($request->get('post_id'));

        $post->comments()->save($reply);

        return back();
    }

    public function destroy($id)
    {
        $comment = Comment::find($id);
        if ($comment) {
            // dd($comment);
            $comment->delete();
            return back();
        } else {
            return redirect()->route('404');
        }
    }

    /*
    public function report($id)
    {
        $comment = Comment::find($id);
        if($comment){
            $report=Report::create([
                'user_id'=>Auth::user()->id,
                'comment_id' =>$id,
            ]);
            $report->save();
            return back();
        }else {
            return redirect()->route('404');
        }
    }

    */
}
