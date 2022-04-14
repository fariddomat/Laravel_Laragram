@extends('home.layouts.app')


@section('content')
    <section class="cover-sec" style="width: 100%;height: 400px;">
        @if ($user->info->cover_image)
            <img src="{{ asset('storage/cover/' . $user->info->cover_image) }}" alt="">
        @else
            <img src="http://via.placeholder.com/1600x400" alt="">
        @endif
    </section>


    <main>
        <div class="main-section">
            <div class="container">
                <div class="main-section-data">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="main-left-sidebar">
                                <div class="user_profile">
                                    <div class="user-pro-img">
                                        <img src="{{ $user->info->profile_img_path }}"
                                            alt="">
                                    </div>
                                    <!--user-pro-img end-->
                                    <div class="user_pro_status">
                                        <ul class="flw-hr">
                                            <li><a href="{{ route('profile') }}" title="" class="flww"><i class="la la-user"></i>
                                                    @lang('site.profile')</a></li>
                                        </ul>
                                        <ul class="flw-status">
                                            <li>
                                                <span>@lang('site.following')</span>
                                                <b>{{ $user->following->count() }}</b>
                                            </li>
                                            <li>
                                                <span>@lang('site.followers')</span>
                                                <b>{{ $user->followers->count() }}</b>
                                            </li>
                                        </ul>
                                    </div>
                                    <!--user_pro_status end-->

                                </div>
                                <!--user_profile end-->

                            </div>
                            <!--main-left-sidebar end-->
                        </div>
                        <div class="col-lg-6">
                            <div class="main-ws-sec">
                                <div class="user-tab-sec">
                                    <h3>{{ $user->fname }} {{ $user->lname }} </h3>
                                    <div class="star-descp">
                                        <span><i class="fa fa-university"></i> {{ $user->college->name }}</span>
                                        <h4 style="margin-top: 35px;
                                                                                            font-size: 37px;
                                                                                            font-weight: lighter;
                                                                                            font-style: oblique;">
                                            {{ $user->info->bio }}</h4>
                                    </div>
                                    <!--star-descp end-->
                                    <div class="tab-feed st2">
                                        <ul>
                                            <li id="feed" data-tab="feed-dd" class="active">
                                                <a href="#" title="">
                                                    <img src="{{ asset('home/images/ic1.png') }}" alt="">
                                                    <span>@lang('site.personalinfo')</span>
                                                </a>
                                            </li>
                                            <li id="info" data-tab="info-dd">
                                                <a href="#" title="">
                                                    <img src="{{ asset('home/images/ic2.png') }}" alt="">
                                                    <span>@lang('site.otherinfo')</span>
                                                </a>
                                            </li>
                                            <li data-tab="saved-posts">
                                                <a href="#" title="">
                                                    <img src="{{ asset('home/images/ic5.png') }}" alt="">
                                                    <span>@lang('site.socialinfo')</span>
                                                </a>
                                            </li>
                                            <li data-tab="portfolio-dd">
                                                <a href="#" title="">
                                                    <img src="{{ asset('home/images/ic3.png') }}" alt="">
                                                    <span>@lang('site.privacy')</span>
                                                </a>
                                            </li>

                                            <li data-tab="payment-dd">
                                                <a href="#" title="">
                                                    <img src="{{ asset('home/images/ic4.png') }}" alt="">
                                                    <span>@lang('site.images')</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div><!-- tab-feed end-->
                                </div>
                                <!--user-tab-sec end-->
                                <div class="product-feed-tab current" id="feed-dd">
                                    <div class="posts-section">
                                        <div class="user-profile-ov">

                                            <form action="{{ route('editprofileinfo') }}" method="POST">
                                                @csrf
                                                @method('Post')
                                                @include('home.layouts._error')

                                                <ul class="social_links">
                                                    <li class="social-link-li"><i class="fa fa-user"></i><input
                                                            name="username"
                                                            value="{{ old('username', $user->username) }}" type="text"
                                                            class="form-control" placeholder="Username"></li>
                                                    <li class="social-link-li"><i class="fa fa-user"></i><input
                                                            name="fname" value="{{ old('fname', $user->fname) }}"
                                                            type="text" class="form-control" placeholder="First name">
                                                    </li>
                                                    <li class="social-link-li"><i class="fa fa-user"></i><input
                                                            name="lname" value="{{ old('lname', $user->lname) }}"
                                                            type="text" class="form-control" placeholder="Last name"></li>

                                                    <li class="social-link-li"><i class="fa fa-envelope"></i><input
                                                            name="email" value="{{ old('email', $user->email) }}"
                                                            type="email" class="form-control"
                                                            placeholder="user@example.com"></li>

                                                    <li class="social-link-li">
                                                        <button type="submit" class="btn btn-success"
                                                            style="margin: 0 40px;">@lang('site.save')</button>
                                                        <a href="#" class="btn btn-warning"
                                                            style="width: auto;color: #fff;">@lang('site.cancel')</a>
                                                    </li>
                                                </ul>
                                            </form>

                                        </div>


                                    </div>
                                    <!--posts-section end-->
                                </div>
                                <!--product-feed-tab end-->
                                <div class="product-feed-tab" id="info-dd">
                                    <div class="user-profile-ov">
                                        <form action="{{ route('editotherinfo') }}" method="POST">
                                            @csrf
                                            @method('POST')
                                            <ul class="social_links">
                                                <li class="social-link-li"><i class="fa fa-book"></i>
                                                    <textarea class="form-control" placeholder="Bio..." name="bio">{{ old('bio', $user->info->bio) }}</textarea>
                                                </li>
                                                <li class="social-link-li"><i class="fa fa-map"></i><input type="text"
                                                        name="address" value="{{ old('address', $user->info->address) }}"
                                                        class="form-control" placeholder="Syria, Damas"></li>
                                                <li class="social-link-li"><i class="fa fa-calendar"></i><input name="dob"
                                                        value="{{ old('dob', $user->info->dob) }}" type="date"
                                                        class="form-control" placeholder="1-1-1995"></li>

                                                <li class="social-link-li"><i class="fa fa-phone"></i><input type="text"
                                                        name="phone" value="{{ old('phone', $user->info->phone) }}"
                                                        class="form-control" placeholder="0999999999"></li>
                                                <li class="social-link-li">
                                                    <button type="submit" class="btn btn-success"
                                                        style="margin: 0 40px;">@lang('site.save')</button>
                                                    <a href="#" class="btn btn-warning"
                                                        style="width: auto;color: #fff;">@lang('site.cancel')</a>
                                                </li>
                                            </ul>
                                        </form>
                                    </div>
                                    <!--user-profile-ov end-->
                                </div>
                                <!--product-feed-tab end-->
                                <div class="product-feed-tab" id="saved-posts">
                                    <div class="posts-section">
                                        <div class="user-profile-ov">

                                            <form action="{{ route('editsocialinfo') }}" method="POST">
                                                @csrf
                                                @method('POST')
                                                <ul class="social_links">
                                                    <li class="social-link-li"><i class="la la-globe"></i><input
                                                            name="website"
                                                            value="{{ old('website', $user->info->website) }}"
                                                            type="text" class="form-control"
                                                            placeholder="www.mywebsite.com"> </li>
                                                    <li class="social-link-li"><i class="fa fa-facebook-square"></i><input
                                                            name="facebook"
                                                            value="{{ old('facebook', $user->info->facebook) }}"
                                                            type="text" class="form-control"
                                                            placeholder="www.facebook.com/username"></li>
                                                    <li class="social-link-li"><i class="fa fa-twitter"></i><input
                                                            type="text" name="twitter"
                                                            value="{{ old('twitter', $user->info->twitter) }}"
                                                            class="form-control" placeholder="www.twitter.com/username">
                                                    </li>

                                                    <li class="social-link-li"><i class="fa fa-linkedin-square"></i><input
                                                            name="linkedin"
                                                            value="{{ old('linkedin', $user->info->linkedin) }}"
                                                            type="text" class="form-control"
                                                            placeholder="www.linkedin.com/username"></li>
                                                    <li class="social-link-li"><i class="fa fa-behance-square"></i><input
                                                            name="behance"
                                                            value="{{ old('behance', $user->info->behance) }}"
                                                            type="text" class="form-control"
                                                            placeholder="www.behance.com/username"></li>
                                                    <li class="social-link-li"><i class="fa fa-pinterest"></i>
                                                        <input name="pinterest"
                                                            value="{{ old('pinterest', $user->info->pinterest) }}"
                                                            type="text" class="form-control"
                                                            placeholder="www.pinterest.com/username">
                                                    </li>
                                                    <li class="social-link-li"><i class="fa fa-instagram"></i>
                                                        <input name="instagram"
                                                            value="{{ old('instagram', $user->info->instagram) }}"
                                                            type="text" class="form-control"
                                                            placeholder="www.instagram.com/username">
                                                    </li>
                                                    <li class="social-link-li"><i class="fa fa-youtube"></i>
                                                        <input name="youtube"
                                                            value="{{ old('youtube', $user->info->youtube) }}"
                                                            type="text" class="form-control"
                                                            placeholder="www.youtube.com/username">
                                                    </li>
                                                    <li class="social-link-li">
                                                        <button type="submit" class="btn btn-success"
                                                            style="margin: 0 40px;">@lang('site.save')</button>
                                                        <a href="#" class="btn btn-warning"
                                                            style="width: auto;
                                                                                        color: #fff;">@lang('site.cancel')</a>
                                                    </li>
                                                </ul>
                                            </form>
                                        </div>
                                    </div>
                                    <!--posts-section end-->
                                </div>
                                <!--product-feed-tab end-->
                                <div class="product-feed-tab" id="portfolio-dd">
                                    <div class="portfolio-gallery-sec">
                                        <form action="{{ route('change.password') }}" method="POST">
                                            @csrf
                                            @method('POST')
                                            @foreach ($errors->all() as $error)
                                                <p class="text-danger">{{ $error }}</p>
                                            @endforeach
                                            <div class="form-group row" style="margin-bottom: 15px;">
                                                <label for="password"
                                                    class="col-md-4 col-form-label text-md-right">@lang('site.currentpassword')</label>
                                                <div class="col-md-6">
                                                    <input id="password" type="password" class="form-control"
                                                        name="current_password" autocomplete="current-password">
                                                </div>
                                            </div>
                                            <div class="form-group row" style="margin-bottom: 15px;">
                                                <label for="password"
                                                    class="col-md-4 col-form-label text-md-right">@lang('site.newpassword')</label>
                                                <div class="col-md-6">
                                                    <input id="new_password" type="password" class="form-control"
                                                        name="new_password" autocomplete="current-password">
                                                </div>
                                            </div>
                                            <div class="form-group row" style="margin-bottom: 15px;">
                                                <label for="password"
                                                    class="col-md-4 col-form-label text-md-right">@lang('site.confirmpassword')</label>
                                                <div class="col-md-6">
                                                    <input id="new_confirm_password" type="password" class="form-control"
                                                        name="new_confirm_password" autocomplete="current-password">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-0">
                                                <div class="col-md-8 offset-md-4">
                                                    <button type="submit" class="btn btn-primary">
                                                        @lang('site.update')
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!--portfolio-gallery-sec end-->
                                </div>
                                <!--product-feed-tab end-->
                                <div class="product-feed-tab" id="payment-dd">
                                    <div class="billing-method" style="padding: 25px;">
                                        <form action="{{ route('editimages') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('POST')
                                            <label for="cover"><i style="" class="fa fa-camera"></i>
                                                @lang('site.changecoverimage')</label>
                                            <input class="form-controll" type="file" name="cover_image" id="">
                                            <label for="cover"><i class="fa fa-camera"></i>
                                                @lang('site.changeprofileimage')</label>
                                            <input class="form-controll" type="file" name="profile_img" id="">
                                            <div class="lt-sec">
                                                <button type="submit" style="display: inline-block;
                                                        color: #ffffff;
                                                        font-size: 16px;
                                                        background-color: #00ADC1;
                                                        padding: 10px 25px;"> Save </button>
                                            </div>
                                        </form>

                                    </div>
                                    <!--billing-method end-->

                                </div>
                                <!--product-feed-tab end-->
                            </div>
                            <!--main-ws-sec end-->
                        </div>
                        <div class="col-lg-3">
                            <div class="right-sidebar">

                                <div class="widget widget-portfolio">
                                    <div class="wd-heady">
                                        <h3>@lang('site.socialinfo')</h3>
                                    </div>
                                    <ul class="social_links">
                                        @if ($user->info)
                                            @if ($user->info->website)
                                                <li><a href="{{ $user->info->website }}" title=""><i
                                                            class="la la-globe"></i>
                                                        {{ $user->info->website }}</a></li>
                                            @endif
                                            @if ($user->info->facebook)
                                                <li><a href="{{ $user->info->facebook }}" title=""><i
                                                            class="fa fa-facebook-square"></i>{{ $user->info->facebook }}</a>
                                                </li>
                                            @endif
                                            @if ($user->info->twitter)
                                                <li><a href="{{ $user->info->twitter }}" title=""><i
                                                            class="fa fa-twitter"></i>{{ $user->info->twitter }}</a>
                                                </li>
                                            @endif
                                            @if ($user->info->linkedin)
                                                <li><a href="{{ $user->info->linkedin }}" title=""><i
                                                            class="fa fa-linkedin-square"></i>{{ $user->info->linkedin }}</a>
                                                </li>
                                            @endif
                                            @if ($user->info->behance)
                                                <li><a href="{{ $user->info->behance }}" title=""><i
                                                            class="fa fa-behance-square"></i>{{ $user->info->behance }}</a>
                                                </li>
                                            @endif
                                            @if ($user->info->pinterest)
                                                <li><a href="{{ $user->info->pinterest }}" title=""><i
                                                            class="fa fa-pinterest"></i>{{ $user->info->pinterest }}</a>
                                                </li>
                                            @endif
                                            @if ($user->info->instagram)
                                                <li><a href="{{ $user->info->instagram }}" title=""><i
                                                            class="fa fa-instagram"></i>{{ $user->info->instagram }}</a>
                                                </li>
                                            @endif
                                            @if ($user->info->youtube)
                                                <li><a href="{{ $user->info->youtube }}" title=""><i
                                                            class="fa fa-youtube"></i>{{ $user->info->youtube }}</a>
                                                </li>
                                            @endif
                                        @else
                                            <h3 style="text-align: center;
                                                        margin: 15px 0;
                                                        font-weight: bold;">No more details !!!</h3>
                                        @endif
                                    </ul>
                                    <!--pf-gallery end-->
                                </div>
                                <!--widget-portfolio end-->
                            </div>
                            <!--right-sidebar end-->
                        </div>
                    </div>
                </div><!-- main-section-data end-->
            </div>
        </div>
    </main>

    <footer>
        <div class="footy-sec mn no-margin">
            <div class="container">
                <ul>
                    <li><a href="#" title="">Help Center</a></li>
                    <li><a href="#" title="">Privacy Policy</a></li>
                    <li><a href="#" title="">Community Guidelines</a></li>
                    <li><a href="#" title="">Cookies Policy</a></li>
                    <li><a href="#" title="">Career</a></li>
                    <li><a href="#" title="">Forum</a></li>
                    <li><a href="#" title="">Language</a></li>
                    <li><a href="#" title="">Copyright Policy</a></li>
                </ul>
                <p><img src="images/copy-icon2.png" alt="">Copyright 2022</p>
                <img class="fl-rgt" src="images/logo2.png" alt="">
            </div>
        </div>
    </footer>
    <!--footer end-->

    </div>
    <!--theme-layout end-->
@endsection
