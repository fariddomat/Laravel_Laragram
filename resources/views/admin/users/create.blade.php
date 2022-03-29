@extends('admin.layouts.app')

@section('content')

<div class="app-content content">
    <div class="content-wrapper">
    <div class="tile mb-4">

        <div class="col-md-10">
            <div class="card">
                <div class="card-header card-header-info">
                    <h4 class="card-title">Create User</h4>
                    <p class="card-category">add new user with Role</p>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.users.store') }}" method="POST">
                        @csrf
                        @method('post')
                        @include('admin.layouts._error')

                        <div class="form-group">
                            <label for="name">User Name</label>
                            <input type="text" class="form-control" name="username" id="name" value="{{ old('username') }}"
                                aria-describedby="helpId" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="name">First Name</label>
                            <input type="text" class="form-control" name="fname" id="name" value="{{ old('fname') }}"
                                aria-describedby="helpId" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="name">Last Name</label>
                            <input type="text" class="form-control" name="lname" id="name" value="{{ old('lname') }}"
                                aria-describedby="helpId" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}"
                                aria-describedby="helpId" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="password_c">Password Confirmation</label>
                            <input type="password" class="form-control" name="password_confirmation" id="password_c"
                                placeholder="">
                        </div>
                        {{-- Roles --}}
                        <div class="form-group">
                            <label for="role">Roles</label>
                            <select class="form-control" name="role_id" id="role_id">
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>

                                @endforeach
                            </select>
                            {{-- <a href="{{ route('admin.roles.create') }}">Create new Role</a> --}}
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>
                                Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
            @endsection
