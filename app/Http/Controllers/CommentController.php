<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File as fFile;

use App\Comment;
use App\Commentfile;
use App\Notifications\UserNotification;
use App\Post;
use App\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        if ($request->hasFile('file')) {
            $allowedfileExtension = ['jpg', 'png', 'gif'];
            $file = $request->file('file');
            $check = 'False';
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $check = in_array($extension, $allowedfileExtension);
            if ($check) {
                try {

                    $comment = new Comment();
                    $comment->comment = $request->comment;
                    $comment->user()->associate($request->user());
                    $post = Post::find($request->post_id);
                    $post->comments()->save($comment);
                    $user = User::find($post->user_id);
                    $details = [
                        'body' =>  $request->user()->fullName() . ' has commented on your post',
                        'data' => "",
                        'actionURL' => url("/posts/" . $post->id),
                        'user_id' => $post->user_id,
                    ];
                    $user->notify(new UserNotification($details));

                    $filename = $file->getClientOriginalName();
                    $file->move(public_path() . '/files/comments/' . $comment->id . '/', $filename);

                    Commentfile::create([
                        'comment_id' => $comment->id,
                        'file' => $filename
                    ]);

                    echo "Upload Successfully";
                } catch (\Throwable $th) {
                    dd($th);
                }
            } else {
                echo '<div class="alert alert-warning"><strong>Warning!</strong> Sorry Only Upload png , jpg , doc</div>';
            }
        } else {
            $request->validate([
                'comment' => 'required'
            ]);
            $comment = new Comment();
            $comment->comment = $request->comment;
            $comment->user()->associate($request->user());
            $post = Post::find($request->post_id);
            $post->comments()->save($comment);
            $user = User::find($post->user_id);
            $details = [
                'body' =>  $request->user()->fullName() . ' has commented on your post',
                'data' => "",
                'actionURL' => url("/posts/" . $post->id),
                'user_id' => $post->user_id,
            ];
            $user->notify(new UserNotification($details));
        }
        return back();
    }

    public function replyStore(Request $request)
    {
        $request->validate([
            'comment' => 'required'
        ]);
        $reply = new Comment();
        $reply->comment = $request->get('comment');
        $reply->user()->associate($request->user());
        $reply->parent_id = $request->get('comment_id');
        $post = Post::find($request->get('post_id'));
        $post->comments()->save($reply);
        $user = User::find($post->user_id);
        $details = [
            'body' =>  $request->user()->fullName() . ' has repled on comment on your post',
            'data' => "",
            'actionURL' => url("/posts/" . $post->id),
            'user_id' => $post->user_id,
        ];
        $user->notify(new UserNotification($details));
        return back();
    }

    public function destroy($id)
    {
        $comment = Comment::find($id);
        if ($comment) {
            if ($comment->withImages()) {
                $path = "/files/comments/$id/" . $comment->commentfile->file;
                fFile::delete(public_path($path));
            }
            $comment->delete();
            return back();
        } else {
            return redirect()->route('404');
        }
    }
}
