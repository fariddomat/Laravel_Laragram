@extends('admin.layouts.app')


@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <br><h1>@lang('site.edit') @lang('site.colleges') <br /> </h1>
            <form action="{{ route('admin.colleges.update', $college->id) }}" method="post">
            @method('PUT')
            @csrf
            @include('admin.layouts._error')
            <input value="{{old('name',$college->name)}}" type="text" name="name" id="" class="form-control col-md-4 mt-2">
            <button type="submit" class="btn btn-success mt-2">@lang('site.update')</button>
            </form>

        </div>
    </div>
@endsection


