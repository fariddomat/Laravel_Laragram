<?php

namespace App\Http\Controllers;

use App\Lecture;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class LectureController extends Controller
{

    public function getDownload($id,$filename){

        $file = public_path()."/files/$id/$filename";
        return Response::download($file);
    }

}
