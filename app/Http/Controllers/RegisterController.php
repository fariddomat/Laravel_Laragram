<?php

namespace App\Http\Controllers;

use App\College;
use App\User;
use App\UserInfo;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
class RegisterController extends Controller
{

    public function register()
    {
        $colleges=College::all();

        $message = "";
        $validator =  Validator::make(request()->all(), [
            'uid' => 'required',
            'email' => 'required',
            'fname' => 'required',
            'lname' => 'required',
            'college_id' => 'required',
            'password' => 'required|min:4',
        ]);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }

        $username = request()->uid;
        $password = request()->password;

        try {
            $student = User::where('username', $username)->get();
            if ($student->count() > 0) {

                $message = "Already registerd.";
                return view('auth.login', compact('message','colleges'));
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
   //Create Student
            $student = User::create([
                'username' => request('uid'),
                'email' => request('email'),
                'fname' => request('fname'),
                'lname' => request('lname'),
                'password' => bcrypt(request('password')),
                'college_id' => request('college_id'),
            ]);
            $student->attachRole('user');
            UserInfo::create([
                'user_id'=>$student->id
            ]);


            return redirect()->route('homePage');

    }


}
