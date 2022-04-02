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
                    <input style="text-align: center" type="text" name="search" placeholder="@lang('site.search')">
                    <button type="submit"><i class="la la-search"></i></button>
                </form>
            </div>
            <!--search-bar end-->
            <nav>
                <ul>
                    <li>
                        <a href="/" title="">
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
                        <a href="#" title="" class="not-box-open">
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
                                <h4>You have <strong class="text-primary">{{auth()->user()->unreadNotifications->count()}}</strong> notifications.
                                    @if (auth()->user()->unreadNotifications->count())
                                      <a class="text-primary" href="{{ route('databasenotifications.markasread') }}">Mark All as Read</a>
                                    @endif</h4>
                            </div>
                            <div class="nott-list">


                                @foreach (auth()->user()->notifications->take(5) as $notification)
                                <a href="#" class="list-group-item">
                                      <div class="d-flex justify-content-between align-items-center">
                                        <div class="text-right text-muted">
                                          <small>
                                            @if (is_null($notification->read_at))
                                              <i class="fa fa-info-circle text-primary" aria-hidden="true"></i>
                                            @else
                                              <i class="fa fa-check text-success" aria-hidden="true"></i>
                                            @endif
                                          </small>
                                          <small>{{$notification->created_at->diffforhumans()}} ago</small>
                                        </div>
                                      </div>
                                      <p class="text-sm mb-0">{{$notification->data['body']}}</p>
                                </a>
                                @endforeach
                                <div class="view-all-nots">
                                    <a href="#" title="">View All Notification</a>
                                </div>
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
                <a href="#" title=""><i class="fa fa-bars"></i></a>
            </div>
            <!--menu-btn end-->
            <div class="user-account" style="width: 125px !important;">
                <div class="user-info">
                    <img src="http://via.placeholder.com/30x30" alt="">
                    <a href="#" title="">{{ Auth::user()->fname }}</a>
                    <i class="la la-sort-down"></i>
                </div>
                <div class="user-account-settingss">
                    <h3>{{ Auth::user()->fullName() }}</h3>

                    <ul class="us-links">
                        @if (Auth::user()->hasRole('super_admin') || Auth::user()->hasRole('admin'))
                        <li><a href="{{ route('admin.dashboard') }}" title=""><i class="fa fa-dashboard"></i>
                            @lang('site.dashboard')</a></li>
                        @endif
                        <li><a href="{{ route('profile') }}" title=""><i class="fa fa-user"></i>
                                @lang('site.viewProfile')</a></li>
                        <li><a href="#" title=""><i class="fa fa-cog"></i> Account Setting</a></li>
                        <li><a href="#" title=""><i class="fa fa-book"></i> Terms & Conditions</a></li>
                    </ul>
                    <h3 class="tc"><a class="" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            <i class="ft-power"></i> @lang('site.logout')
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </h3>
                </div>
                <!--user-account-settingss end-->
            </div>
        </div>
        <!--header-data end-->
    </div>
</header>
<!--header end-->
