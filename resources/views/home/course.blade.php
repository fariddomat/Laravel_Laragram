@extends('home.layouts.app')


@section('content')
    <section class="forum-page">
        <div class="container">
            <div class="forum-questions-sec">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="forum-questions">
                            @if ($lectures->count() > 0)
                                @foreach ($lectures as $lecture)
                                    <div class="usr-question">
                                        <div class="usr_quest">
                                            <h3><i class="fa fa-book"></i> {{ $lecture->title }}</h3>

                                        </div>
                                        <!--usr_quest end-->
                                        <span class="quest-posted-time" style="bottom: unset !important;"><i
                                                class="fa fa-clock-o"></i>{{ $lecture->created_at->diffforhumans() }}</span>
                                        <div class="epi-sec">
                                            <ul class="descp">
                                                <li><img src="{{ asset('home/images/icon8.png') }}"
                                                        alt=""><span>@lang('site.lecture')</span></li>
                                            </ul>


                                            <div class="react-links">
                                                {!! $lecture->post->content !!}

                                                @if ($lecture->post->withImages())
                                                    @if ($lecture->post->hasMoreThanOneImage())
                                                        <div class="swiper mySwiper">
                                                            <div class="swiper-wrapper">
                                                                @foreach ($lecture->post->images_path as $item)
                                                                    <div class="swiper-slide">
                                                                        <img class="object-cover w-full h-96 post-img"
                                                                            src="{{ $item }}" alt="image" />
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                            <div class="swiper-button-next"></div>
                                                            <div class="swiper-button-prev"></div>

                                                            <div class="swiper-pagination"></div>
                                                        </div>
                                                    @else
                                                        <img class="post-img" src="{{ $lecture->post->image_path }}"
                                                            alt="">
                                                    @endif
                                                @endif

                                                <div>

                                                    @if ($lecture->post->withFiles())
                                                        <ul class="quest-tags">
                                                            @foreach ($lecture->post->files as $file)
                                                                <li><a href="{{ route('getDownload', [$lecture->post->id, $file->file]) }}"
                                                                        title="" target="_blank"><i
                                                                            class="fa fa-download"></i>
                                                                        {{ $file->file }}</a></li>
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                    <!--usr-question end-->
                                @endforeach
                            @else
                                <div class="post-bar">
                                    <div class="post_topbar">
                                        <h3>No Lecture to show</h3>
                                    </div>
                                </div>
                            @endif

                        </div>
                        <!--forum-questions end-->

                    </div>
                    <div class="col-lg-4">
                        <div class="widget widget-user">
                            <h3 class="title-wd"><i class="fa fa-university"></i> {{ $name }}
                                <br><br>
                                <span class="mt-2" style="font-size: medium;
                                            font-style: italic;
                                            padding-left: 25px;">@lang('site.LatestAddedLectures')</span>
                            </h3>
                            <ul>
                                @if ($lectures->count() > 0)
                                    @foreach ($lectures as $lecture)
                                        <li>
                                            <div class="usr-msg-details">
                                                <div class="usr-ms-img">
                                                    <i class="fa fa-book"></i>
                                                </div>
                                                <div class="usr-mg-info">
                                                    <h3>{{ $lecture->course->name }} : {{ $lecture->title }}</h3>
                                                    <p>{{ $lecture->post->user->username }}</p>
                                                </div>
                                                <!--usr-mg-info end-->
                                            </div>
                                            <span><img src="{{ asset('home/images/price1.png') }}" alt=""></span>
                                        </li>
                                    @endforeach
                                @endif



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
