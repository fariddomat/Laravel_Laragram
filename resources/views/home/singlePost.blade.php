@extends('home.layouts.app')


@section('content')

    <main>
        <div class="main-section">
            <section class="forum-page">
                <div class="container">
                    <div class="forum-questions-sec">
                        <div class="row">
                            <div class="col-lg-12">
                                @include('home.layouts._error')
                            </div>
                            <div class="col-lg-8">
                                <div class="forum-post-view">
                                    <div class="usr-question">
                                        <div class="usr_img">
                                            <img src="{{ $post->user->info->profile_img_path }}"
                                                style="max-width: 60px;max-height: 60px" alt="">
                                        </div>
                                        <div class="usr_quest">
                                            <a href="{{ route('user.show', $post->user->username) }}">
                                                <h3>{{ $post->user->fullName() }}</h3>
                                            </a>
                                            <span><i
                                                    class="fa fa-clock-o"></i>{{ $post->created_at->diffforhumans() }}</span>

                                            <p dir='auto'>{!! $post->content !!}
                                                @if ($post->withFiles())
                                                    <ul class="quest-tags">
                                                        @foreach ($post->files as $file)
                                                            <li>
                                                                <a href="{{ route('getDownload', [$post->id, $file->file]) }}"
                                                                    title="" target="_blank"><i class="fa fa-download"></i>
                                                                    {{ $file->file }}</a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </p>

                                            @if ($post->withVideo())
                                                <video style="margin-bottom: 15px;
                                border-radius: 10px;" src="/files/{{ $post->id . '/' . $post->withVideo() }}"
                                                    controls></video>
                                            @endif
                                            @if ($post->withImages())
                                                @if ($post->hasMoreThanOneImage())
                                                    <div class="swiper mySwiper" style="width: 100%;">
                                                        <div class="swiper-wrapper">
                                                            @foreach ($post->images_path as $item)
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
                                                    <img class="post-img" src="{{ $post->image_path }}" alt="">
                                                @endif
                                            @endif
                                            <div class="post-status-bar">
                                                <ul class="like-com">
                                                    @if ($post->isFollower($post->user->id) || $post->type != 'post' || ($post->user->id == Auth::id()))
                                                        @if ($post->isAuthUserLikedPost())
                                                            <li>
                                                                <a id="saveLike" data-type="dislike"
                                                                    data-post="{{ $post->id }}"
                                                                    class="active"><i class="la la-heart"></i>
                                                                    <p style="float: right;"
                                                                        class="like{{ $post->id }}">
                                                                        @lang('site.unlike')
                                                                    </p>
                                                                </a>
                                                                <img src="{{ asset('home/images/liked-img.png') }}"
                                                                    alt="">
                                                                <span
                                                                    class="like-count{{ $post->id }}">{{ $post->likes->count() }}</span>
                                                            </li>
                                                        @else
                                                            <li>
                                                                <a id="saveLike" data-type="like"
                                                                    data-post="{{ $post->id }}"><i
                                                                        class="la la-heart"></i>
                                                                    <p style="float: right;"
                                                                        class="like{{ $post->id }}">
                                                                        @lang('site.like')
                                                                    </p>
                                                                </a>
                                                                <img src="{{ asset('home/images/liked-img.png') }}"
                                                                    alt="">
                                                                <span
                                                                    class="like-count{{ $post->id }}">{{ $post->likes->count() }}</span>
                                                            </li>
                                                        @endif
                                                    @else
                                                        <li>
                                                            <a><i class="la la-heart"></i>
                                                            </a>
                                                            <img src="{{ asset('home/images/liked-img.png') }}" alt="">
                                                            <span
                                                                class="like-count{{ $post->id }}">{{ $post->likes->count() }}</span>
                                                        </li>
                                                    @endif


                                                </ul>
                                                <a data-id="{{ $post->id }}" data-content="{{ $post->content }}"
                                                    class="share-post-btn"><i
                                                        class="la la-share"></i>@lang('site.shares')
                                                    {{ $post->shares->count() }}</a>
                                            </div>
                                            <div class="comment-section">
                                                <h3>{{ $post->comments->count() }} @lang('site.comments')</h3>
                                                <div class="comment-sec">
                                                    {{-- <ul>
                                                @foreach ($post->comments as $comment)
                                                <li>
                                                    <div class="comment-list">
                                                        <div class="bg-img">
                                                            <img src="http://via.placeholder.com/40x40" alt="">
                                                        </div>
                                                        <div class="comment">
                                                            <h3>{{$comment->user->fullName()}}</h3>
                                                            <span><img src="images/clock.png" alt="">{{ $comment->created_at->diffforhumans() }}</span>
                                                            <p>{{ $comment->comment }}</p>
                                                        </div>
                                                    </div>
                                                    <!--comment-list end-->
                                                </li>
                                                @endforeach

                                            </ul> --}}
                                                    @include('home.layouts._replies', [
                                                        'comments' => $post->comments,
                                                        'post_id' => $post->id,
                                                    ])

                                                </div>
                                                <!--comment-sec end-->
                                            </div>
                                        </div>
                                        <!--usr_quest end-->
                                    </div>
                                    <!--usr-question end-->
                                </div>
                                <!--forum-post-view end-->
                                @if ($post->isFollower($post->user->id) || $post->user_id == Auth::id() || $post->type != 'post')
                                    <div class="post-comment-box">
                                        {{-- <h3>{{$post->comments->count()}} Comments</h3> --}}
                                        <div class="user-poster">
                                            <div class="usr-post-img">
                                                <img src="{{ Auth::user()->info->profile_img_path }}"
                                                    style="max-width: 40px;max-height: 40px"" alt="">
                                                                        </div>
                                                                        <div class="       post_comment_sec">
                                                <form method="post" action="{{ route('comment.add') }}">
                                                    @csrf
                                                    <input type="hidden" name="post_id" value="{{ $post->id }}" />

                                                    <textarea placeholder="Your Comment" name="comment" required></textarea>
                                                    <button type="submit">@lang('site.comment')</button>
                                                </form>
                                            </div>
                                            <!--post_comment_sec end-->
                                        </div>
                                        <!--user-poster end-->
                                    </div>
                                @endif

                                <!--post-comment-box end-->
                            </div>
                            <div class="col-lg-4">
                                <div class="widget widget-feat">
                                    <h3 style="margin-bottom: 15px;
                                                                font-style: oblique;
                                                                font-weight: bold;
                                                                color: rebeccapurple;">@lang('site.TypeofthisPost') :
                                        @lang("site.$post->type")
                                    </h3>
                                    <ul>
                                        <li>
                                            <i class="fa fa-heart"></i>
                                            <span>{{ $post->likes->count() }}</span>
                                        </li>
                                        <li>
                                            <i class="fa fa-comment"></i>
                                            <span>{{ $post->comments->count() }}</span>
                                        </li>
                                        <li>
                                            <i class="fa fa-share-alt"></i>
                                            <span>{{ $post->shares->count() }}</span>
                                        </li>
                                        <li>
                                            <a href="{{ route('save', $post->id) }}"><i class="fa fa-bookmark"
                                                    style="color: orange"></i></a>
                                            <a href="{{ route('report.post', $post->id) }}"><i class="fa fa-ban"
                                                    style="color: red"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <!--widget-feat end-->
                                <div class="widget widget-user">
                                    <h3 class="title-wd">@lang('site.Userpostscount')</h3>
                                    <ul>
                                        <li>
                                            <div class="usr-msg-details">
                                                <div class="usr-ms-img">
                                                    <img src="{{ $post->user->info->profile_img_path }}"
                                                        style="max-height: 50px;max-width: 50px;" alt="">
                                                </div>
                                                <div class="usr-mg-info">
                                                    <h3><a
                                                            href="{{ route('user.show', $post->user->username) }}">{{ $post->user->fullName() }}</a>
                                                    </h3>
                                                </div>
                                                <!--usr-mg-info end-->
                                            </div>
                                            <span><img src="images/price1.png"
                                                    alt="">{{ $post->user->posts_count }}</span>
                                        </li>
                                    </ul>
                                </div>
                                <!--widget-user end-->

                            </div>
                        </div>
                    </div>
                    <!--forum-questions-sec end-->
                </div>
            </section>
        </div>
    </main>
    <!--forum-page end-->

    {{-- shares --}}
    @include('home.layouts._share')

@endsection
