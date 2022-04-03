<div class="post-bar">
    <div class="post_topbar">
        <div class="usy-dt">
            <img src="http://via.placeholder.com/50x50" alt="">
            <div class="usy-name">
                <h3><a href="{{ route('user.show', $post->user->username) }}">{{ $post->user->fullName() }}</a>
                </h3>
                <span><img src="{{ asset('home/images/clock.png') }}"
                        alt="">{{ $post->created_at->diffforhumans() }}
                </span>
            </div>
        </div>
        <div class="ed-opts">
            <a href="#" title="" class="ed-opts-open"><i
                    class="la la-ellipsis-v"></i></a>
            <ul class="ed-options">
                <li><a href="{{ route('posts.show', ['post'=>$post->id]) }}" title="">View Post</a></li>
                <li><a href="#" title="">Edit Post</a></li>
                <li><a href="#" title="">Hide</a></li>
                <li><a href="#" title="">Report</a></li>
            </ul>
        </div>
    </div>
    <div class="epi-sec">
        <ul class="descp">
            <li><img src="{{ asset('home/images/icon8.png') }}"
                    alt=""><span><a href="{{ route('user.show', $post->user->username) }}">{{ $post->user->username }}</a></span></li>
            <li><img src="{{ asset('home/images/icon9.png') }}"
                    alt=""><span>{{ $post->user->college->name }}</span>
            </li>
        </ul>
        <ul class="bk-links">
            <li><a href="#" title=""><i class="la la-bookmark"></i></a></li>
            {{-- <li><a href="#" title=""><i class="la la-envelope"></i></a></li> --}}
        </ul>
    </div>
    <div class="post_descp">
        <p dir='auto'>{!! $post->content !!}
            {{-- <a href="#" title="">@lang('site.viewMore')</a> --}}
        </p>
        @if ($post->withImages())
            @if ($post->hasMoreThanOneImage())
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        @foreach ($post->images_path as $item)
                            <div class="swiper-slide">
                                <img class="object-cover w-full h-96 post-img"
                                    src="{{ $item }}"
                                    alt="image" />
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>

                    <div class="swiper-pagination"></div>
                </div>
            @else
                <img class="post-img" src="{{ $post->image_path }}"
                    alt="">
            @endif
        @endif



    </div>
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
            <li><a href="{{ route('posts.show', ['post'=>$post->id]) }}" title="" class="com"><img
                        src="{{ asset('home/images/com.png') }}" alt="">
                    @lang('site.comment') {{ $post->comments->count() }}</a></li>
        </ul>
        <a
        data-id="{{ $post->id }}"
        data-content="{{ $post->content }}"  class="share-post-btn"><i class="la la-share"></i>shares
            {{ $post->shares->count() }}</a>
    </div>
</div>
