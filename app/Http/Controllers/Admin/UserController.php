<?php

namespace App\Http\Controllers\Admin;

use App\College;
use App\DataTables\UsersDataTable;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\User;
use App\UserInfo;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Auth;
use Lang;
use Session;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:read_users')->only(['index']);
        $this->middleware('permission:create_users')->only(['create','store']);
        $this->middleware('permission:update_users')->only(['edit','update']);
        $this->middleware('permission:delete_users')->only(['destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UsersDataTable $dataTable)
    {
        return $dataTable->render('admin.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $colleges=College::all();
        $roles=Role::where('name', '!=','super_admin')->get();
        // dd($roles);
        return view('admin.users.create',compact('roles', 'colleges'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'username'=>'required|regex:/(^[a-zA-Z]+[a-zA-Z0-9\\-]*$)/u|unique:users,username',
            'fname'=>'required',
            'lname'=>'required',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|confirmed',
            'role_id'=>'required|numeric',
        ]);
        $request->merge(['password'=>bcrypt($request->password)]);
        $user=User::create($request->all());
        UserInfo::create([
            'user_id'=>$user->id
        ]);
        $user->attachRoles([$request->role_id]);
        Session::flash('success','Successfully Created !');
        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles=Role::where('name', '!=','super_admin')->get();
        $colleges=College::all();
        $user=User::find($id);
        if($user->hasRole('super_admin')){
            abort(403);
        }
        return view('admin.users.edit',compact('roles','user', 'colleges'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'username'=>'required|regex:/(^[a-zA-Z]+[a-zA-Z0-9\\-]*$)/u|unique:users,username,' . $id,
            'fname'=>'required',
            'lname'=>'required',
            'email'=>'required|email|unique:users,email,' . $id,
            'role_id'=>'required|numeric',
        ]);
        $user=User::find($id);

        $user->update($request->all());
        $user->syncRoles([$request->role_id]);
        Session::flash('success','Successfully updated !');
        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::find($id);
        if($user->hasRole('super_admin')){
            abort(403);
        }
        $user->delete();

        Session::flash('success','Successfully deleted !');
        return redirect()->route('admin.users.index');
    }

    public function ban($id)
    {
        $user = User::find($id);
        if ($user) {
            if($user->hasRole('super_admin')){
                abort(403);
            }
            $user->update([
                'status'=>'ban'
            ]);
            return redirect()->route('admin.users.index');
        } else
            return response()->json(['message' => 'error'], 404);
    }

    public function unban($id)
    {
        $user = User::find($id);
        if($user->hasRole('super_admin')){
            abort(403);
        }
        if ($user) {
            $user->update([
                'status'=>'active'
            ]);
            return redirect()->route('admin.users.index');
        } else
            return response()->json(['message' => 'error'], 404);
    }
}
