<header style="">
    <div class="container">
        <div class="header-data">
            <div class="logo">
                <a href="/" title=""><img style="max-width: 35px !important" src="{{ asset('home/images/logo.png') }}"
                        alt=""></a>
            </div>
            <!--logo end-->
            <div class="search-bar">
                <form>
                    <input class="form-control" style="text-align: center" type="search" name="search"
                     placeholder="@lang('site.search')">
                    <button type="submit"><i class="la la-search"></i></button>
                </form>
            </div>
            <!--search-bar end-->
            <nav>
                <ul>
                    <li>
                        <a href="{{ route('homePage') }}" title="">
                            <span><img src="{{ asset('home/images/icon1.png') }}" alt=""></span>
                            @lang('site.home')
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('news') }}" title="">
                            <span><img src="{{ asset('home/images/icon2.png') }}" alt=""></span>
                            @lang('site.news')
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('projects') }}" title="">
                            <span><img src="{{ asset('home/images/icon3.png') }}" alt=""></span>
                            @lang('site.projects')
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('courses') }}" title="">
                            <span><img src="{{ asset('home/images/icon5.png') }}" alt=""></span>
                            @lang('site.courses')
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('private') }}" title="" class="not-box-open">
                            <span><img src="{{ asset('home/images/icon6.png') }}" alt=""></span>
                            @lang('site.messages')
                        </a>

                        <!--notification-box end-->
                    </li>
                    <li>
                        <a title="" class="not-box-open">
                            <span><img src="{{ asset('home/images/icon7.png') }}" alt="">
                                @if (auth()->user()->unreadNotifications->count())
                                <i class="badge badge-warning" style="position: relative;
                                top: -17px;
                                left: -10px;
                                color: blue;">{{auth()->user()->unreadNotifications->count()}}</i>
                              @endif</span>
                            @lang('site.notifications')
                        </a>
                        <div class="notification-box">
                            <div class="nt-title">
                                <h4>@lang('site.Youhave') <strong class="text-primary">{{auth()->user()->unreadNotifications->count()}}</strong> @lang('site.notifications').
                                    @if (auth()->user()->unreadNotifications->count())
                                      <a class="text-primary" href="{{ route('databasenotifications.markasread') }}">@lang('site.markAllRead')</a>
                                    @endif</h4>
                            </div>
                            <div class="nott-list">


                                @foreach (auth()->user()->notifications->take(5) as $notification)
                                <a href="{{$notification->data['actionURL']}}" class="list-group-item">
                                      <div class="d-flex justify-content-between align-items-center">
                                        <div class="text-right text-muted">
                                          <small>
                                            @if (is_null($notification->read_at))
                                              <i class="fa fa-info-circle text-primary" aria-hidden="true"></i>
                                            @else
                                              <i class="fa fa-check text-success" aria-hidden="true"></i>
                                            @endif
                                          </small>
                                          <small>{{$notification->created_at->diffforhumans()}} @lang('site.ago')</small>
                                        </div>
                                      </div>
                                      <p class="text-sm mb-0">{{$notification->data['body']}}</p>
                                </a>
                                @endforeach
                                {{-- <div class="view-all-nots">
                                    <a href="#" title="">@lang('site.ViewAllNottifications')</a>
                                </div> --}}
                            </div>
                            <!--nott-list end-->
                        </div>
                        <!--notification-box end-->
                    </li>
                    <li><a class="not-box-open" id="dropdown-flag" href="#" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            @if (app()->getLocale() == 'ar')
                                <i class="flag-icon flag-icon-sy"></i>
                            @else
                                <i class="flag-icon flag-icon-us"></i>
                            @endif
                            <span class="selected-language"></span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdown-flag">
                            <div class="arrow_box"><a class="dropdown-item"
                                    href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}"><i
                                        class="flag-icon flag-icon-us"></i> @lang('site.English')</a><a
                                    class="dropdown-item"
                                    href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}"><i
                                        class="flag-icon flag-icon-sy"></i>
                                    @lang('site.Arabic')</a></div>
                        </div>
                    </li>

                </ul>
            </nav>
            <!--nav end-->
            <div class="menu-btn">
                <a  title=""><i class="fa fa-bars"></i></a>
            </div>
            <!--menu-btn end-->
            <div class="user-account" style="width: 125px !important;">
                <div class="user-info">
                    <img src="{{Auth::user()->info->profile_img_path}}" style="max-height: 30px;max-width: 30px" alt="">
                    <a title="">{{ Auth::user()->fname }}</a>
                    <i class="la la-sort-down"></i>
                </div>
                <div class="user-account-settingss">
                    <h3>{{ Auth::user()->fullName() }}</h3>

                    <ul class="us-links">
                        @if (Auth::user()->hasRole('super_admin') || Auth::user()->hasRole('admin'))
                        <li><a href="{{ route('admin.dashboard') }}" title=""><i class="fa fa-dashboard"></i>
                            @lang('site.controlPanel')</a></li>
                        @endif
                        <li><a href="{{ route('profile') }}" title=""><i class="fa fa-user"></i>
                                @lang('site.viewProfile')</a></li>
                        <li><a href="{{ route('saved') }}" title=""><i class="fa fa-bookmark"></i> @lang('site.saved')</a></li>
                        <li><a href="{{ route('editprofileinfo') }}" title=""><i class="fa fa-cog"></i> @lang('site.accountSetting')</a></li>
                        <li><a href="#" title=""><i class="fa fa-book"></i> @lang('site.terms')</a></li>
                    </ul>
                    <h3 class="tc"><a class="" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            <i class="ft-power"></i> @lang('site.logout')
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </h3>
                    <ul class="us-links">
                        <li><a href="{{ route('style', 1) }}" title="">
                                @lang('site.style') 1 <i class="fa fa-desktop" style="color: #00AFC1"></i></a></li>
                        <li><a href="{{ route('style', 2) }}" title=""> @lang('site.style') 2 <i class="fa fa-desktop" style="color: #533E85"></i></a></li>
                        <li><a href="{{ route('style', 3) }}" title=""> @lang('site.style') 3 <i class="fa fa-desktop" style="color: #FA4EAB"></i></a></li>
                        <li><a href="{{ route('style', 4) }}" title=""> @lang('site.style') 4 <i class="fa fa-desktop" style="color: #39AEA9"></i></a></li>
                        <li><a href="{{ route('style', 5) }}" title=""> @lang('site.style') 5 <i class="fa fa-desktop" style="color: #FD5D5D"></i></a></li>
                    </ul>
                </div>
                <!--user-account-settingss end-->
            </div>
        </div>
        <!--header-data end-->
    </div>
</header>
<!--header end-->
