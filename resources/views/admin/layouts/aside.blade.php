<!-- ////////////////////////////////////////////////////////////////////////////-->


<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true"
    data-img="{{ asset('admin/theme-assets/images/backgrounds/02.jpg') }}">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="#"><img class="brand-logo" alt="admin logo"
                        src="{{ asset('admin/logo.png') }}" />
                    <h3 class="brand-text">Dashboard</h3>
                </a></li>
            <li class="nav-item d-md-none"><a class="nav-link close-navbar"><i class="ft-x"></i></a></li>
        </ul>
    </div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="active"><a href="{{ route('admin.dashboard') }}"><i class="ft-home"></i><span
                        class="menu-title" data-i18n="">@lang('site.dashboard')</span></a>
            </li>
            <li class=" nav-item"><a href="{{ route('admin.users.index') }}"><i class="ft-users"></i><span
                        class="menu-title" data-i18n="">@lang('site.users')</span></a>
            </li>

            <li class=" nav-item"><a href="{{ route('admin.colleges.index') }}"><i
                        class="ft-layers"></i><span class="menu-title"
                        data-i18n="">@lang('site.colleges')</span></a>
            </li>
            <li class=" nav-item"><a href="{{ route('admin.courses.index') }}"><i
                        class="ft-book"></i><span class="menu-title"
                        data-i18n="">@lang('site.courses')</span></a>
            </li>

            <li class=" nav-item"><a href="{{ route('admin.posts.index') }}"><i class="ft-clipboard"></i><span
                        class="menu-title" data-i18n="">@lang('site.posts')</span></a>
            </li>
        </ul>
    </div><a class="btn btn-danger btn-block btn-glow btn-upgrade-pro mx-1" href="/"
        target="_blank">@lang('site.home')!</a>
    <div class="navigation-background"></div>
</div>
