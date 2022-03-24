@extends('home.layouts.app')


@section('content')
    <section class="forum-page">
        <div class="container">
            <div class="forum-questions-sec">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="forum-questions">
                            @if ($courses->count() > 0)
                                @foreach ($courses as $course)
                                    <div class="usr-question">
                                        <div class="usr_quest">
                                            <h3><i class="fa fa-book"></i> {{ $course->name }}</h3>

                                        </div>
                                        <!--usr_quest end-->
                                        <span class="quest-posted-time" style="bottom: unset !important;"><i class="fa fa-clock-o"></i>{{ $course->updated_at->diffforhumans() }}</span>
                                        <div class="epi-sec">
                                            <ul class="descp">
                                                <li><img src="{{ asset('home/images/icon8.png') }}"
                                                        alt=""><span>Lectures {{ $course->lectures->count() }}</span></li>
                                                <li><img src="{{ asset('home/images/icon9.png') }}"
                                                        alt=""><span>{{ $course->college->name }}</span>
                                                </li>
                                            </ul>
                                            <ul class="bk-links">
                                                <li><a href="{{ route('course', $course->name) }}" title=""><i class="la la-link"></i></a></li>
                                                <li><a href="#" title=""><i class="la la-share"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <!--usr-question end-->
                                @endforeach
                            @else
                                <div class="post-bar">
                                    <div class="post_topbar">
                                        <h3>No Course to show</h3>
                                    </div>
                                </div>
                            @endif

                        </div>
                        <!--forum-questions end-->

                    </div>
                    <div class="col-lg-4">
                        <div class="widget widget-user">
                            <h3 class="title-wd"><i class="fa fa-university"></i> {{Auth::user()->college->name }} Courses <br><span style="font-size: medium;
                                font-style: italic;
                                padding-left: 25px;">Latest Added Lectures</span></h3>
                            <ul>
                                @foreach ($courses as $course)
                                @foreach ($course->lectures as $lecture)
                                <li>
                                    <div class="usr-msg-details">
                                        <div class="usr-ms-img">
                                            <i class="fa fa-book"></i>
                                        </div>
                                        <div class="usr-mg-info">
                                            <h3>{{$lecture->course->name}} : {{$lecture->title}}</h3>
                                            <p>{{$lecture->post->user->username}}</p>
                                        </div>
                                        <!--usr-mg-info end-->
                                    </div>
                                    <span><img src="{{ asset('home/images/price1.png') }}" alt=""></span>
                                </li>
                                @endforeach
                                @endforeach


                            </ul>
                        </div>
                        <!--widget-user end-->

                    </div>
                </div>
            </div>
            <!--forum-questions-sec end-->
        </div>
    </section>
    <!--forum-page end-->

@endsection

