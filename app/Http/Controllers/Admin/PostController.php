<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\PostsDataTable;
use App\Post;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:read_posts')->only(['index']);
        $this->middleware('permission:create_posts')->only(['create','store']);
        $this->middleware('permission:update_posts')->only(['edit','update']);
        $this->middleware('permission:delete_posts')->only(['destroy']);
    }
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PostsDataTable $dataTable)
    {
        return $dataTable->render('admin.posts.index');
    }

    public function destroy($id)
    {
        $post=Post::find($id);

        if ($post) {
            $post->delete();
        }
        return redirect()->back();
    }
}
