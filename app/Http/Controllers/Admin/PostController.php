<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\PostsDataTable;
use App\Post;

class PostController extends Controller
{
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
