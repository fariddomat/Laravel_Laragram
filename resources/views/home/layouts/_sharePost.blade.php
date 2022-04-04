<div class="post-bar">
    <div class="post_topbar">
        <div class="" style="border-bottom: 1px solid #e5e5e5;
        padding-bottom: 10px;
        margin-bottom: 5px;"><h3 class="mb-2 ml-1" style="font-weight: bold">@lang('site.sharedBy'): <span style="color: black; font-weight: normal">
            {{ $share->user->fullName() }} : {{ $share->created_at->diffforhumans() }}</span>
    </h3>
    <p dir='auto' class="mb-2">{!! $share->content !!}
        {{-- <a href="#" title="">@lang('site.viewMore')</a> --}}
    </p></div>
        <div class="usy-dt">

            <img src="http://via.placeholder.com/50x50" alt="">
            <div class="usy-name">
                <h3><a href="{{ route('user.show', $share->post->user->username) }}">{{ $share->post->user->fullName() }}</a>
                </h3>
                <span><img src="{{ asset('home/images/clock.png') }}"
                        alt="">{{ $share->post->created_at->diffforhumans() }}
                </span>
            </div>
        </div>
        <div class="ed-opts">
            <a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
            <ul class="ed-options">
                <li><a href="{{ route('posts.show', ['post' => $share->post->id]) }}" title="">View Post</a></li>
                <li><a href="#" title="">Edit Post</a></li>
                <li><a href="#" title="">Hide</a></li>
                <li><a href="#" title="">Report</a></li>
            </ul>
        </div>
    </div>
    <div class="epi-sec">
        <ul class="descp">
            <li><img src="{{ asset('home/images/icon8.png') }}" alt=""><span><a
                        href="{{ route('user.show', $share->post->user->username) }}">{{ $share->post->user->username }}</a></span>
            </li>
            <li><img src="{{ asset('home/images/icon9.png') }}" alt=""><span>{{ $share->post->user->college->name }}</span>
            </li>
        </ul>
        <ul class="bk-links">
            <li><a href="#" title=""><i class="la la-bookmark"></i></a></li>
            {{-- <li><a href="#" title=""><i class="la la-envelope"></i></a></li> --}}
        </ul>
    </div>
    <div class="post_descp">
        <p dir='auto'>{!! $share->post->content !!}
            {{-- <a href="#" title="">@lang('site.viewMore')</a> --}}
        </p>
        @if ($share->post->withImages())
            @if ($share->post->hasMoreThanOneImage())
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        @foreach ($share->post->images_path as $item)
                            <div class="swiper-slide">
                                <img class="object-cover w-full h-96 post-img" src="{{ $item }}" alt="image" />
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>

                    <div class="swiper-pagination"></div>
                </div>
            @else
                <img class="post-img" src="{{ $share->post->image_path }}" alt="">
            @endif
        @endif



    </div>
    <div class="post-status-bar">
        <ul class="like-com">
            @if ($share->post->isAuthUserLikedPost())
                <li>
                    <a id="saveLike" data-type="dislike" data-post="{{ $share->post->id }}" class="active"><i
                            class="la la-heart"></i>
                        <p style="float: right;" class="like{{ $share->post->id }}">@lang('site.unlike')</p>
                    </a>
                    <img src="{{ asset('home/images/liked-img.png') }}" alt="">
                    <span class="like-count{{ $share->post->id }}">{{ $share->post->likes->count() }}</span>
                </li>
            @else
                <li>
                    <a id="saveLike" data-type="like" data-post="{{ $share->post->id }}"><i class="la la-heart"></i>
                        <p style="float: right;" class="like{{ $share->post->id }}">@lang('site.like')</p>
                    </a>
                    <img src="{{ asset('home/images/liked-img.png') }}" alt="">
                    <span class="like-count{{ $share->post->id }}">{{ $share->post->likes->count() }}</span>
                </li>
            @endif
            <li><a href="{{ route('posts.show', ['post' => $share->post->id]) }}" title="" class="com"><img
                        src="{{ asset('home/images/com.png') }}" alt="">
                    @lang('site.comment') {{ $share->post->comments->count() }}</a></li>
        </ul>
        <a data-id="{{ $share->post->id }}" data-content="{{ $share->post->content }}" class="share-post-btn"><i
                class="la la-share"></i>shares
            {{ $share->post->shares->count() }}</a>
    </div>
</div>
