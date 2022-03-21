@extends('admin.layouts.app')


@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <br><h1>@lang('site.edit') @lang('site.colleges') <br /> </h1>
            <form action="{{ route('admin.colleges.store') }}" method="post">
            @method('POST')
            @csrf
            @include('admin.layouts._error')
            <input type="text" name="name" id="" class="form-control col-md-4 mt-2">
            <button type="submit" class="btn btn-success mt-2">@lang('site.save')</button>
            </form>

        </div>
    </div>
@endsection


