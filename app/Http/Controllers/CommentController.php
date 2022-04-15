<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Notifications\UserNotification;
use App\Post;
use App\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'comment'=>'required'
        ]);
        $comment = new Comment();
        $comment->comment = $request->comment;
        $comment->user()->associate($request->user());
        $post = Post::find($request->post_id);
        $post->comments()->save($comment);
        $user=User::find($post->user_id);
        $details = [
            'body' =>  $request->user()->fullName(). ' has commented on your post',
            'data' => "",
            'actionURL' => url("/posts/".$post->id),
            'user_id'=>$post->user_id,
        ];
        $user->notify(new UserNotification($details));
        return back();
    }

    public function replyStore(Request $request)
    {
        $request->validate([
            'comment'=>'required'
        ]);
        $reply = new Comment();
        $reply->comment = $request->get('comment');
        $reply->user()->associate($request->user());
        $reply->parent_id = $request->get('comment_id');
        $post = Post::find($request->get('post_id'));
        $post->comments()->save($reply);
        $user=User::find($post->user_id);
        $details = [
            'body' =>  $request->user()->fullName(). ' has repled on comment on your post',
            'data' => "",
            'actionURL' => url("/posts/".$post->id),
            'user_id'=>$post->user_id,
        ];
        $user->notify(new UserNotification($details));
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


}
