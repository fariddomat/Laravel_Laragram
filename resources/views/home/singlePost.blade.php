@extends('home.layouts.app')


@section('content')

    <section class="forum-page">
        <div class="container">
            <div class="forum-questions-sec">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="forum-post-view">
                            <div class="usr-question">
                                <div class="usr_img">
                                    <img src="http://via.placeholder.com/60x60" alt="">
                                </div>
                                <div class="usr_quest">
                                    <h3>{{ $post->user->fullName() }}</h3>
                                    <span><i class="fa fa-clock-o"></i>{{ $post->created_at->diffforhumans() }}</span>

                                    <p>{!! $post->content !!}</p>
                                    @if ($post->withImages())
                                        @if ($post->hasMoreThanOneImage())
                                            <div class="swiper mySwiper">
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
                                            @if ($post->isAuthUserLikedPost())
                                                <li>
                                                    <a id="saveLike" data-type="dislike"
                                                        data-post="{{ $post->id }}"
                                                        class="active"><i
                                                            class="la la-heart"></i>
                                                        <p style="float: right;"
                                                            class="like{{ $post->id }}">unlike</p>
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
                                                            class="like{{ $post->id }}">Like</p>
                                                    </a>
                                                    <img src="{{ asset('home/images/liked-img.png') }}"
                                                        alt="">
                                                    <span
                                                        class="like-count{{ $post->id }}">{{ $post->likes->count() }}</span>
                                                </li>
                                            @endif

                                        </ul>
                                        <a><i class="la la-share"></i>shares
                                            {{ $post->shares->count() }}</a>
                                    </div>
                                    <div class="comment-section">
                                        <h3>{{$post->comments->count()}} Comments</h3>
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
                        @include('home.layouts._replies', ['comments' => $post->comments, 'post_id' => $post->id])

                                        </div>
                                        <!--comment-sec end-->
                                    </div>
                                </div>
                                <!--usr_quest end-->
                            </div>
                            <!--usr-question end-->
                        </div>
                        <!--forum-post-view end-->
                        <div class="post-comment-box">
                            {{-- <h3>{{$post->comments->count()}} Comments</h3> --}}
                            <div class="user-poster">
                                <div class="usr-post-img">
                                    <img src="http://via.placeholder.com/40x40" alt="">
                                </div>
                                <div class="post_comment_sec">
                                    <form method="post" action="{{ route('comment.add') }}">
                                    @csrf
                                    <input type="hidden" name="post_id" value="{{ $post->id }}" />

                                        <textarea placeholder="Your Answer" name="comment"></textarea>
                                        <button type="submit">Post Comment</button>
                                    </form>
                                </div>
                                <!--post_comment_sec end-->
                            </div>
                            <!--user-poster end-->
                        </div>
                        <!--post-comment-box end-->
                    </div>
                    <div class="col-lg-4">
                        <div class="widget widget-feat">
                            <ul>
                                <li>
                                    <i class="fa fa-heart"></i>
                                    <span>{{$post->likes->count()}}</span>
                                </li>
                                <li>
                                    <i class="fa fa-comment"></i>
                                    <span>{{$post->comments->count()}}</span>
                                </li>
                                <li>
                                    <i class="fa fa-share-alt"></i>
                                    <span>{{$post->shares->count()}}</span>
                                </li>
                                <li>
                                    <i class="fa fa-bookmark" style="color: orange"></i>
                                    <i class="fa fa-ban" style="color: red"></i>
                                </li>
                            </ul>
                        </div>
                        <!--widget-feat end-->
                        <div class="widget widget-user">
                            <h3 class="title-wd">Top User of the Week</h3>
                            <ul>
                                <li>
                                    <div class="usr-msg-details">
                                        <div class="usr-ms-img">
                                            <img src="http://via.placeholder.com/50x50" alt="">
                                        </div>
                                        <div class="usr-mg-info">
                                            <h3>Jessica William</h3>
                                            <p>Graphic Designer </p>
                                        </div>
                                        <!--usr-mg-info end-->
                                    </div>
                                    <span><img src="images/price1.png" alt="">1185</span>
                                </li>
                                <li>
                                    <div class="usr-msg-details">
                                        <div class="usr-ms-img">
                                            <img src="http://via.placeholder.com/50x50" alt="">
                                        </div>
                                        <div class="usr-mg-info">
                                            <h3>John Doe</h3>
                                            <p>PHP Developer</p>
                                        </div>
                                        <!--usr-mg-info end-->
                                    </div>
                                    <span><img src="images/price2.png" alt="">1165</span>
                                </li>
                                <li>
                                    <div class="usr-msg-details">
                                        <div class="usr-ms-img">
                                            <img src="http://via.placeholder.com/50x50" alt="">
                                        </div>
                                        <div class="usr-mg-info">
                                            <h3>Poonam</h3>
                                            <p>Wordpress Developer </p>
                                        </div>
                                        <!--usr-mg-info end-->
                                    </div>
                                    <span><img src="images/price3.png" alt="">1120</span>
                                </li>
                                <li>
                                    <div class="usr-msg-details">
                                        <div class="usr-ms-img">
                                            <img src="http://via.placeholder.com/50x50" alt="">
                                        </div>
                                        <div class="usr-mg-info">
                                            <h3>Bill Gates</h3>
                                            <p>C & C++ Developer </p>
                                        </div>
                                        <!--usr-mg-info end-->
                                    </div>
                                    <span><img src="images/price4.png" alt="">1009</span>
                                </li>
                            </ul>
                        </div>
                        <!--widget-user end-->
                        <div class="widget widget-adver">
                            <img src="http://via.placeholder.com/370x270" alt="">
                        </div>
                        <!--widget-adver end-->
                    </div>
                </div>
            </div>
            <!--forum-questions-sec end-->
        </div>
    </section>
    <!--forum-page end-->

@endsection
