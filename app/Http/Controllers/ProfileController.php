<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{

    public function show(Request $request)
    {
        $user = User::find(Auth::user()->id);
        if (empty($user)) {
            abort(403);
        }
        $posts = Post::where('user_id', Auth::user()->id)->orderByDesc('id')->paginate(5);
        $userIds = $user->following()->get()->pluck('id');
        $userIds[] = $user->id;
        $suggestionsUsers= User::where('college_id',$user->id)->whereNotIn('id', $userIds)->get(6) ;
        $projects=Post::where('user_id', Auth::user()->id)->where('type','project')->orderByDesc('id')->take(5)->get();
        return view('home.profile', compact('user', 'posts', 'suggestionsUsers', 'projects'));
    }

    public function lazyload(Request $request)
    {
        if ($request->ajax()) {
            $posts = Post::where('user_id', Auth::user()->id)->orderByDesc('id')->paginate(5);
            return response()->json(['data' => $posts]);
        }
        return view('employee.lazyload');
    }

    public function edit()
    {
        $user = User::find(Auth::user()->id);
        return view('home.editProfileInfo', compact('user'));
    }

    /*
        username
        first name
        last name
        email
    */
    public function savePersonalInfo(Request $request)
    {
        $id = Auth::user()->id;
        $request->validate([
            'username' => 'required|unique:users,username,' . $id,
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'email|required',
        ]);
        $user = User::find($id);
        $user->update($request->all());

        Session::flash('success', 'Successfully Created !');
        return redirect()->route('editprofileinfo');
    }

    public function saveOtherInfo(Request $request)
    {
        $id = Auth::user()->id;
        $request->validate([
            'dob' => 'sometimes|nullable|date',
            'phone' => 'sometimes|nullable|regex:/(0)[0-9]{9}/',
        ]);
        $userInfo = UserInfo::whereUserId($id);
        $userInfo->update($request->except(['_token', '_method']));

        Session::flash('success', 'Successfully Created !');
        return redirect()->route('editprofileinfo');
    }

    public function saveSocialInfo(Request $request)
    {
        $id = Auth::user()->id;
        $userInfo = UserInfo::whereUserId($id);
        $userInfo->update($request->except(['_token', '_method']));

        Session::flash('success', 'Successfully Created !');
        return redirect()->route('editprofileinfo');
    }

    public function saveImage(Request $request)
    {
        $id = Auth::user()->id;
        $userInfo = UserInfo::whereUserId($id);
        //update
        $request->validate([
            'cover_image' => 'sometimes|nullable|image',
            'profile_img' => 'sometimes|nullable|image'
        ]);
        if ($request->cover_image) {
            // $this->remove_previous('cover_image', $userInfo);

            $cover_image = Image::make($request->cover_image)
                ->resize(1600, 400)
                ->encode('jpg');

            Storage::disk('local')->put('public/cover/' . $request->cover_image->hashName(), (string)$cover_image, 'public');
            $request_data['cover_image'] = $request->cover_image->hashName();
        } //end of if
        if ($request->profile_img) {
            // $this->remove_previous('cover_image', $userInfo);

            $profile_img = Image::make($request->profile_img)
                ->resize(170, 170)
                ->encode('jpg');

            Storage::disk('local')->put('public/profile/' . $request->profile_img->hashName(), (string)$profile_img, 'public');
            $request_data['profile_img'] = $request->profile_img->hashName();
        } //end of if
        $userInfo->update($request_data);

        Session::flash('success', 'Successfully Created !');
        return redirect()->route('editprofileinfo');
    }

    public function style($id)
    {
        $user=User::find(Auth::id());
        if ($user) {
            $user->update([
                'style'=>$id
            ]);
        }
        return redirect()->back();
    }
}
