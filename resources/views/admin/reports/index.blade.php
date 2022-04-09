@extends('admin.layouts.app')


@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <br><h1>@lang('site.reports') <br /> </h1>
            {!! $dataTable->table() !!}
        </div>
    </div>
@endsection

@push('datatable-scripts')
{!! $dataTable->scripts() !!}
@endpush

