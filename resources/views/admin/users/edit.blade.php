@extends('admin.layouts.app')

@section('content')

<div class="app-content content">
    <div class="content-wrapper">
    <div class="tile mb-4">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header card-header-info">
                    <h4 class="card-title">Edit User</h4>
                    <p class="card-category">update user with Role</p>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                        @csrf
                        @method('put')
                        @include('admin.layouts._error')

                        <div class="form-group">
                            <label for="name">User Name</label>
                            <input type="text" class="form-control" name="username" id="name"
                                value="{{ old('username', $user->username) }}" aria-describedby="helpId" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="name">First Name</label>
                            <input type="text" class="form-control" name="fname" id="name"
                                value="{{ old('fname', $user->fname) }}" aria-describedby="helpId" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="name">Last Name</label>
                            <input type="text" class="form-control" name="lname" id="name"
                                value="{{ old('lname', $user->lname) }}" aria-describedby="helpId" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email"
                                value="{{ old('email', $user->email) }}" aria-describedby="helpId" placeholder="">
                        </div>


                        {{-- Roles --}}
                        <div class="form-group">
                            <label for="role">Roles</label>
                            <select class="form-control" name="role_id" id="role_id">
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>
                                        {{ $role->name }}</option>

                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>
                                Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
            @endsection
