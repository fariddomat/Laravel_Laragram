@extends('home.layouts.app')


@section('content')
    <section class="cover-sec" style="width: 100%;height: 400px;">
        @if ($user->info->cover_image)
            <img src="{{ asset('storage/cover/' . $user->info->cover_image) }}" alt="">
        @else
            <img src="http://via.placeholder.com/1600x400" alt="">
        @endif
        <a href="{{ route('editprofile') }}" title=""><i class="fa fa-camera"></i> @lang('site.changeimage')</a>
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

                                            <img src="{{$user->info->profile_img_path}}"
                                                alt="" style="">

                                        <a href="{{ route('editprofile') }}" title=""><i style="color: white !important;" class="fa fa-camera"></i></a>
                                    </div>
                                    <!--user-pro-img end-->
                                    <div class="user_pro_status">

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
                                        <ul class="flw-status" style="margin-top: 15px;">
                                            <li>
                                                <a href="{{ route('editprofile') }}" title="">@lang('site.editProfile') <i
                                                        class="fa fa-edit"></i> </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!--user_pro_status end-->
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
                                                                                            font-weight: bold;">No more
                                                details
                                                !!!
                                            </h3>
                                        @endif
                                    </ul>
                                </div>
                                <!--user_profile end-->
                                <div class="suggestions full-width">
                                    <div class="sd-title">
                                        <h3>@lang('site.suggestions')</h3>
                                        <i class="la la-ellipsis-v"></i>
                                    </div>
                                    <!--sd-title end-->
                                    <div class="suggestions-list">
                                        @foreach ($suggestionsUsers as $item)
                                            <div class="suggestion-usd">
                                                <img src="{{$item->info->profile_img_path}}" style="max-width: 35px;max-height: 35px;" alt="">
                                                <div class="sgt-text">
                                                    <h4>{{ $item->fullName() }}</h4>
                                                    <span>{{ $item->username }}</span>
                                                </div>
                                                <span><a href="{{ route('user.show', ['user' => $item->username]) }}"><i
                                                            class="la la-link"></i></a></span>
                                            </div>
                                        @endforeach

                                    </div>
                                    <!--suggestions-list end-->
                                </div>
                                <!--suggestions end-->
                            </div>
                            <!--main-left-sidebar end-->
                        </div>
                        <div class="col-lg-6">
                            <div class="main-ws-sec">
                                <div class="user-tab-sec">
                                    <h3>{{ $user->fullName() }} </h3>
                                    <div class="star-descp">
                                        <span><i class="fa fa-university"></i> {{ $user->college->name }}</span>
                                        <h4 style="margin-top: 35px;
                                                                                            font-size: 37px;
                                                                                            font-weight: lighter;
                                                                                            font-style: oblique;">
                                            {{ $user->info->bio }}
                                        </h4>
                                    </div>
                                   
                                </div>
                                <!--user-tab-sec end-->
                                <div class="product-feed-tab current " id="feed-dd">
                                    <div class="posts-section">
                                        <div class="scrolling-pagination">

                                            @if ($posts->count() > 0)
                                                @foreach ($posts as $post)
                                                   @include('home.layouts._post')
                                                @endforeach

                                                {{ $posts->links() }}
                                            @else
                                                <div class="post-bar">
                                                    <div class="post_topbar">
                                                        <h3>No posts to show</h3>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <!--main-ws-sec end-->
                        </div>
                        <div class="col-lg-3">
                            <div class="right-sidebar">

                                <div class="widget widget-portfolio">
                                    <div class="wd-heady">
                                        <h3>@lang('site.portfolio')</h3>
                                        <img src="images/photo-icon.png" alt="">
                                    </div>
                                    <div class="pf-gallery">
                                        <ul>
                                            <li><a href="#" title=""><img src="http://via.placeholder.com/70x70" alt=""></a>
                                            </li>
                                            <li><a href="#" title=""><img src="http://via.placeholder.com/70x70" alt=""></a>
                                            </li>
                                            <li><a href="#" title=""><img src="http://via.placeholder.com/70x70" alt=""></a>
                                            </li>
                                            <li><a href="#" title=""><img src="http://via.placeholder.com/70x70" alt=""></a>
                                            </li>
                                            <li><a href="#" title=""><img src="http://via.placeholder.com/70x70" alt=""></a>
                                            </li>
                                            <li><a href="#" title=""><img src="http://via.placeholder.com/70x70" alt=""></a>
                                            </li>
                                            <li><a href="#" title=""><img src="http://via.placeholder.com/70x70" alt=""></a>
                                            </li>
                                            <li><a href="#" title=""><img src="http://via.placeholder.com/70x70" alt=""></a>
                                            </li>
                                            <li><a href="#" title=""><img src="http://via.placeholder.com/70x70" alt=""></a>
                                            </li>
                                            <li><a href="#" title=""><img src="http://via.placeholder.com/70x70" alt=""></a>
                                            </li>
                                            <li><a href="#" title=""><img src="http://via.placeholder.com/70x70" alt=""></a>
                                            </li>
                                            <li><a href="#" title=""><img src="http://via.placeholder.com/70x70" alt=""></a>
                                            </li>
                                        </ul>
                                    </div>
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

    <div class="overview-box" id="overview-box">
        <div class="overview-edit">
            <h3>Overview</h3>
            <span>5000 character left</span>
            <form>
                <textarea></textarea>
                <button type="submit" class="save">Save</button>
                <button type="submit" class="cancel">Cancel</button>
            </form>
            <a href="#" title="" class="close-box"><i class="la la-close"></i></a>
        </div>
        <!--overview-edit end-->
    </div>
    <!--overview-box end-->


    <div class="overview-box" id="experience-box">
        <div class="overview-edit">
            <h3>Experience</h3>
            <form>
                <input type="text" name="subject" placeholder="Subject">
                <textarea></textarea>
                <button type="submit" class="save">Save</button>
                <button type="submit" class="save-add">Save & Add More</button>
                <button type="submit" class="cancel">Cancel</button>
            </form>
            <a href="#" title="" class="close-box"><i class="la la-close"></i></a>
        </div>
        <!--overview-edit end-->
    </div>
    <!--overview-box end-->

    <div class="overview-box" id="education-box">
        <div class="overview-edit">
            <h3>Education</h3>
            <form>
                <input type="text" name="school" placeholder="School / University">
                <div class="datepicky">
                    <div class="row">
                        <div class="col-lg-6 no-left-pd">
                            <div class="datefm">
                                <input type="text" name="from" placeholder="From" class="datepicker">
                                <i class="fa fa-calendar"></i>
                            </div>
                        </div>
                        <div class="col-lg-6 no-righ-pd">
                            <div class="datefm">
                                <input type="text" name="to" placeholder="To" class="datepicker">
                                <i class="fa fa-calendar"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="text" name="degree" placeholder="Degree">
                <textarea placeholder="Description"></textarea>
                <button type="submit" class="save">Save</button>
                <button type="submit" class="save-add">Save & Add More</button>
                <button type="submit" class="cancel">Cancel</button>
            </form>
            <a href="#" title="" class="close-box"><i class="la la-close"></i></a>
        </div>
        <!--overview-edit end-->
    </div>
    <!--overview-box end-->

    <div class="overview-box" id="location-box">
        <div class="overview-edit">
            <h3>Location</h3>
            <form>
                <div class="datefm">
                    <select>
                        <option>Country</option>
                        <option value="pakistan">Pakistan</option>
                        <option value="england">England</option>
                        <option value="india">India</option>
                        <option value="usa">United Sates</option>
                    </select>
                    <i class="fa fa-globe"></i>
                </div>
                <div class="datefm">
                    <select>
                        <option>City</option>
                        <option value="london">London</option>
                        <option value="new-york">New York</option>
                        <option value="sydney">Sydney</option>
                        <option value="chicago">Chicago</option>
                    </select>
                    <i class="fa fa-map-marker"></i>
                </div>
                <button type="submit" class="save">Save</button>
                <button type="submit" class="cancel">Cancel</button>
            </form>
            <a href="#" title="" class="close-box"><i class="la la-close"></i></a>
        </div>
        <!--overview-edit end-->
    </div>
    <!--overview-box end-->

    <div class="overview-box" id="skills-box">
        <div class="overview-edit">
            <h3>Skills</h3>
            <ul>
                <li><a href="#" title="" class="skl-name">HTML</a><a href="#" title="" class="close-skl"><i
                            class="la la-close"></i></a></li>
                <li><a href="#" title="" class="skl-name">php</a><a href="#" title="" class="close-skl"><i
                            class="la la-close"></i></a></li>
                <li><a href="#" title="" class="skl-name">css</a><a href="#" title="" class="close-skl"><i
                            class="la la-close"></i></a></li>
            </ul>
            <form>
                <input type="text" name="skills" placeholder="Skills">
                <button type="submit" class="save">Save</button>
                <button type="submit" class="save-add">Save & Add More</button>
                <button type="submit" class="cancel">Cancel</button>
            </form>
            <a href="#" title="" class="close-box"><i class="la la-close"></i></a>
        </div>
        <!--overview-edit end-->
    </div>
    <!--overview-box end-->

    <div class="overview-box" id="create-portfolio">
        <div class="overview-edit">
            <h3>Create Portfolio</h3>
            <form>
                <input type="text" name="pf-name" placeholder="Portfolio Name">
                <div class="file-submit">
                    <input type="file" name="file">
                </div>
                <div class="pf-img">
                    <img src="http://via.placeholder.com/60x60" alt="">
                </div>
                <input type="text" name="website-url" placeholder="htp://www.example.com">
                <button type="submit" class="save">Save</button>
                <button type="submit" class="cancel">Cancel</button>
            </form>
            <a href="#" title="" class="close-box"><i class="la la-close"></i></a>
        </div>
        <!--overview-edit end-->
    </div>
    <!--overview-box end-->

    </div>
    <!--theme-layout end-->

    {{-- Share post --}}
    @include('home.layouts._share')


@endsection
