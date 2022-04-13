<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File as fFile;
use App\File;
use App\Lecture;
use App\Like;
use App\Notifications\UserNotification;
use App\Post;
use App\Share;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class PostController extends Controller
{

    // Save Like Or dislike
    function save_likedislike(Request $request)
    {
        $data = new Like;
        $data->post_id = $request->post;
        $data->user_id = Auth::user()->id;
        $like = Like::where('post_id', $data->post_id)->count();
        if ($like == 0) {
            $data->save();
            $user = User::find($data->user_id);
            $details = [
                'body' =>  $user->fullName() . ' has liked your post',
                'data' => "",
                'actionURL' => url("/posts/" . $data->post_id),
                'user_id' => $data->user_id,
            ];

            $post = Post::find($data->post_id);
            $user2 = User::find($post->user_id);
            $user2->notify(new UserNotification($details));
            return response()->json([
                'bool' => 'like'
            ]);
        } else {
            $like = Like::where('post_id', $data->post_id)->where('user_id', $data->user_id);
            $like->delete();
            $user = User::find($data->user_id);
            $details = [
                'body' =>  $user->fullName() . ' has liked your post',
                'data' => "",
                'actionURL' => url("/posts/" . $data->post_id),
                'user_id' => $data->user_id,
            ];

            $post = Post::find($data->post_id);
            $user2 = User::find($post->user_id);
            $user2->notify(new UserNotification($details));
            return response()->json([
                'bool' => 'dislike'
            ]);
        }
        return response()->json([
            'bool' => true
        ]);
    }


    // Share Post
    public function share(Request $request)
    {
        $request->validate([
            // 'content' => 'required',
            'post_id' => 'required'
        ]);

        Share::create([
            'content' => $request->content,
            'post_id' => $request->post_id,
            'user_id' => Auth::id()
        ]);

        $post = Post::find($request->post_id);

        $user = User::find(Auth::id());

        $details = [
            'body' =>  $request->user()->fullName() . ' has shared your post',
            'data' => "",
            'actionURL' => url("/posts/" . $post->id),
            'user_id' => $post->user_id,
        ];
        $user2 = User::find($post->user_id);
        $user2->notify(new UserNotification($details));

        Session::flash('success', 'Successfully share !');
        return redirect()->back();
    }

    public function unshare($id)
    {
        $share = Share::find($id);
        if (empty($share)) {
            abort(403);
        }
        if ($share) {

            $share->delete();
            return redirect()->back();
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->type);
        if ($request->type == 'lecture') {
            $request->validate([
                'content' => 'required',
                'type' => 'required',
                // 'privacy' => 'required',
                'course' => 'required',
            ]);
        } else {
            $request->validate([
                'content' => 'required',
                'type' => 'required',
                // 'privacy' => 'required',
            ]);
        }

        $allowedfileExtension = [];
        if ($request->type == "post" || $request->type == "news") {
            $allowedfileExtension = ['jpg', 'png', 'gif', 'mp4', 'avi', 'mkv', 'txt'];
        } elseif ($request->type == "lecture" || $request->type == "project") {
            $allowedfileExtension = ['pdf', 'jpg', 'png', 'docx', 'txt'];
        }

        // dd($request->all());
        $post = "";
        if ($request->hasFile('files')) {

            $files = $request->file('files');
            $check = 'False';
            foreach ($files as $file) {
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $check = in_array($extension, $allowedfileExtension);
                //dd($check);
            }
            if ($check) {
                $post = Post::create([
                    'user_id' => Auth::user()->id,
                    'content' => $request->content,
                    'type' => $request->type,
                    'privacy' => 'public',

                ]);
                foreach ($request->file('files') as $file) {
                    $filename = $file->getClientOriginalName();
                    $file->move(public_path() . '/files/' . $post->id . '/', $filename);
                    // $filename = $file->store('public/files');
                    File::create([
                        'post_id' => $post->id,
                        'file' => $filename
                    ]);
                }
                echo "Upload Successfully";
            } else {
                echo '<div class="alert alert-warning"><strong>Warning!</strong> Sorry Only Upload png , jpg , doc</div>';
            }
        } else {
            $post = Post::create([
                'user_id' => Auth::user()->id,
                'content' => $request->content,
                'type' => $request->type,
                'privacy' => 'public',

            ]);
        }

        if ($request->type == 'lecture') {
            $lectureCount = Lecture::where('course_id', $request->course)->count();
            $lectureCount = $lectureCount + 1;
            $lecture = Lecture::create([
                'title' => 'Lecture ' . $lectureCount,
                'course_id' => $request->course,
                'post_id' => $post->id,

            ]);
        }



        Session::flash('success', 'Successfully Created !');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        if (empty($post)) {
            abort(403);
        }
        // dd($post);
        return view('home.singlePost', compact('post'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->post_id);
        $post = Post::find($request->post_id);
        if (empty($post)) {
            abort(403);
        }
        $post->update([
            'content' => $request->content
        ]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        if (empty($post)) {
            abort(403);
        }
        if ($post) {
            if ($post->withFiles()) {
                foreach ($post->files as $file) {
                    $path = "/files/$id/" . $file->file;
                    // unlink($path);
                    // dd($path);
                    fFile::delete(public_path($path));
                }
            }
            $post->delete();
            return redirect()->back();
        }
    }
}
