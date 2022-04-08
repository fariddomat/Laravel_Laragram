@extends('admin.layouts.app')


@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <br><h1>@lang('site.edit') @lang('site.courses') <br /> </h1>
            <form action="{{ route('admin.courses.update', $courses->id) }}" method="post">
            @method('PUT')
            @csrf
            @include('admin.layouts._error')
            <select name="college_id" id="" class="form-control col-md-4 mt-2" disabled>
                @foreach ($colleges as $item)
                <option value="{{$courses->course_id ? $item->id:'selected' }}">{{$item->name}}</option>
                @endforeach
            </select>
            <input value="{{old('name',$courses->name)}}" type="text" name="name" id="" class="form-control col-md-4 mt-2">
            <button type="submit" class="btn btn-success mt-2">@lang('site.update')</button>
            </form>

        </div>
    </div>
@endsection


