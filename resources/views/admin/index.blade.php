@extends('admin.layouts.app')


@section('content')
    <!-- ////////////////////////////////////////////////////////////////////////////-->



    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- Chart -->
                <div class="row match-height">
                    <div class="col-12">
                        <div class="">
                            <div id="gradient-line-chart1" class="height-250 GradientlineShadow1"></div>
                        </div>
                    </div>
                </div>
                <!-- Chart -->
                <div class="row">
                    <div class="col-xl-3 col-lg-6 col-md-12">
                        <div class="card pull-up ecom-card-1 bg-white">
                            <div class="card-content ecom-card2 height-180">
                                <h5 class="text-muted danger position-absolute p-1">@lang('site.users')</h5>
                                <div>
                                    <i class="ft-users danger font-large-1 float-right p-1"></i>
                                </div>
                                <div class="progress-stats-container ct-golden-section height-75 position-relative pt-3  ">
                                    <div id="progress-stats-bar-chart">
                                        <h3 style="padding: 40px 15px;">{{$users}}</h3>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-12">
                        <div class="card pull-up ecom-card-1 bg-white">
                            <div class="card-content ecom-card2 height-180">
                                <h5 class="text-muted primary position-absolute p-1">@lang('site.colleges')</h5>
                                <div>
                                    <i class="ft-layers primary font-large-1 float-right p-1"></i>
                                </div>
                                <div class="progress-stats-container ct-golden-section height-75 position-relative pt-3  ">
                                    <div id="progress-stats-bar-chart">
                                        <h3 style="padding: 40px 15px;">{{$colleges}}</h3>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-12">
                        <div class="card pull-up ecom-card-1 bg-white">
                            <div class="card-content ecom-card2 height-180">
                                <h5 class="text-muted success position-absolute p-1">@lang('site.courses')</h5>
                                <div>
                                    <i class="ft-book success font-large-1 float-right p-1"></i>
                                </div>
                                <div class="progress-stats-container ct-golden-section height-75 position-relative pt-3  ">
                                    <div id="progress-stats-bar-chart">
                                        <h3 style="padding: 40px 15px;">{{$courses}}</h3>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-12">
                        <div class="card pull-up ecom-card-1 bg-white">
                            <div class="card-content ecom-card2 height-180">
                                <h5 class="text-muted warning position-absolute p-1">@lang('site.posts')</h5>
                                <div>
                                    <i class="ft-clipboard warning font-large-1 float-right p-1"></i>
                                </div>
                                <div class="progress-stats-container ct-golden-section height-75 position-relative pt-3  ">
                                    <div id="progress-stats-bar-chart">
                                        <h3 style="padding: 40px 15px;">{{$posts}}</h3>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->
@endsection
