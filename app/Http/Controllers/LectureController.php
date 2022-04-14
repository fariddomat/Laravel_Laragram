<?php

namespace App\Http\Controllers;

use App\Lecture;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\File as fFile;

class LectureController extends Controller
{

    public function getDownload($id,$filename){

        $file = public_path()."/files/$id/$filename";
        return Response::download($file);
    }

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
                    fFile::delete(public_path($path));
                }
            }
            $post->delete();
            return redirect()->back();
        }
    }

}
