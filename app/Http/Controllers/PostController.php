<?php

namespace App\Http\Controllers;

use App\File;
use App\Like;
use App\Post;
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
        $like = Like::where('post_id',$data->post_id)->count();
        if ($like==0) {
            $data->save();
            return response()->json([
                'bool' => 'like'
            ]);
        } else {
            $like = Like::where('post_id', $data->post_id)->where('user_id', $data->user_id);
            $like->delete();
            return response()->json([
                'bool' => 'dislike'
            ]);
        }
        return response()->json([
            'bool' => true
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $request->validate([
            'content' => 'required',
            'type' => 'required',
            'privacy' => 'required',
        ]);
        $allowedfileExtension = [];
        if ($request->type == "Post" || $request->type = "News") {
            $allowedfileExtension = ['jpg', 'png', 'gif', 'mp4', 'avi', 'mkv','txt'];
        } elseif ($request->type = "Lecture" || $request->type = "Project") {
            $allowedfileExtension = ['pdf', 'jpg', 'png', 'docx','txt'];
        }

        // dd($request->all());
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
                    'privacy' => $request->privacy,

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
                'privacy' => $request->privacy,

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
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
