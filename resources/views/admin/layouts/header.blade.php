<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description"
        content="admin dashboard">
    <meta name="keywords"
        content="admin , admin template, dashboard template , webapp, dashboard, analytic dashboard">
    <meta name="author" content="ThemeSelect">
    <title>Dashboard - Admin </title>
    <link rel="apple-touch-icon" href="{{ asset('admin/theme-assets/images/ico/apple-icon-120.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('admin/theme-assets/images/ico/favicon.ico') }}">
    <link
        href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i%7CComfortaa:300,400,700"
        rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/theme-assets/css/vendors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/theme-assets/vendors/css/charts/chartist.css') }}">
    <!-- END VENDOR CSS-->
    <!-- BEGIN CHAMELEON  CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/theme-assets/css/app-lite.css') }}">
    <!-- END CHAMELEON  CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin/theme-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin/theme-assets/css/core/colors/palette-gradient.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/theme-assets/css/pages/dashboard-ecommerce.css') }}">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <!-- END Custom CSS-->

    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" /> --}}

    <link href="http://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="http://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!-- #region datatables files -->
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
    <!-- #endregion -->
    <link type="text/css" href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
        rel="stylesheet">

    <style>
        tr td:last-child {
            display: block ruby;
        }

    </style>
    @if (app()->getLocale() == 'ar')
        <link rel="stylesheet" href="{{ asset('admin/assets/css/style-rtl.css') }}">
        <link rel="stylesheet" href="{{ asset('admin/assets/css/bootstrap-rtl.min.css') }}">
        <link rel="stylesheet" href="{{ asset('admin/assets/css/rtl.css') }}">
        {{-- <link rel="stylesheet" href="{{ asset('dist/css/rtl.css') }}"> --}}
        <style>
            #users-table {
                direction: rtl;
                text-align: right;
            }

            #users-table_filter {
                direction: rtl !important;
                text-align: right;
            }

            h1 {
                text-align: right
            }

            .main-menu {
                direction: rtl;
                text-align: right;
                right: 0;
            }

            .app-content {
                margin-left: 0 !important;
                margin-right: 250px;
            }

            .header-navbar {
                margin-right: 250px;
            }

            .navbar-container {
                margin-left: 0 !important;
            }

            .dropdown-language .dropdown-menu {
                left: 0 !important;
                direction: rtl;
            }

            .dropdown-notification .dropdown-menu {

                direction: rtl;
            }

            .dropdown-user .dropdown-menu {

                direction: rtl;
            }

            .main-menu-content i {
                margin-right: 0 !important;
                margin-left: 12px;
            }

            .dropdown-item .avatar {
                direction: rtl;
            }

            .dropdown-menu .show {
                direction: rtl !important;
            }

            .card-content {
                direction: rtl !important;
            }

            .card-content i {
                position: absolute;
                left: 0;
            }

            .card .card-title {
                float: right;
            }

            .card .heading-elements {
                right: unset !important;
            }

            .footer {
                margin-left: 0 !important;
            }

            @media screen and (max-width: 768px) {
                .header-navbar {
                    margin-right: 0;
                }

                .app-content {
                    margin-right: 0;
                }
            }

            .sidebar-mini.sidebar-collapse .content-wrapper,
            .sidebar-mini.sidebar-collapse .right-side,
            .sidebar-mini.sidebar-collapse .main-footer {
                margin-right: 50px !important
            }

            .notify-alert.notify-success.animated,
            .notify-alert.notify-error.animated {
                direction: ltr !important;
                right: inherit !important;
                left: 0 !important;
                margin-top: 22px !important;
            }

        </style>
    @else
        <style>
            .dir-lte-home {
                direction: rtl !important;
            }

            .h-head {
                float: inline-end;
            }

            /* .main-sidebar{
        left: 0;
      }
      .content-wrapper{
        margin-right: 0!important;
        margin-left: 236px!important;
      }
      .sidebar-mini.sidebar-collapse .content-wrapper, .sidebar-mini.sidebar-collapse .right-side, .sidebar-mini.sidebar-collapse .main-footer {
      margin-left: 50px !important;
        }
      .main-footer{
        margin-right: 0;
      } */

            .main-header .navbar-custom-menu,
            .main-header .navbar-right {
                float: right;
            }

            .main-header .sidebar-toggle {
                float: left;
            }

        </style>
    @endif

</head>

<body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="click"
    data-menu="vertical-menu" data-color="bg-chartbg" data-col="2-columns">

    <!-- fixed-top-->
    <nav
        class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light">
        <div class="navbar-wrapper">
            <div class="navbar-container content">
                <div class="collapse navbar-collapse show" id="navbar-mobile">
                    <ul class="nav navbar-nav mr-auto float-left">
                        <li class="nav-item d-block d-md-none"><a class="nav-link nav-menu-main menu-toggle hidden-xs"
                                href="#"><i class="ft-menu"></i></a></li>
                        <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i
                                    class="ficon ft-maximize"></i></a></li>
                        {{-- <li class="nav-item dropdown navbar-search"><a class="nav-link dropdown-toggle hide"
                                data-toggle="dropdown" href="#"><i class="ficon ft-search"></i></a>
                            <ul class="dropdown-menu">
                                <li class="arrow_box">
                                    <form>
                                        <div class="input-group search-box">
                                            <div class="position-relative has-icon-right full-width">
                                                <input class="form-control" id="search" type="text"
                                                    placeholder="Search here...">
                                                <div class="form-control-position navbar-search-close"><i
                                                        class="ft-x"> </i></div>
                                            </div>
                                        </div>
                                    </form>
                                </li>
                            </ul>
                        </li> --}}
                    </ul>
                    <ul class="nav navbar-nav float-right">
                        <li class="dropdown dropdown-language nav-item"><a class="dropdown-toggle nav-link"
                                id="dropdown-flag" href="#" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
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
                    <ul class="nav navbar-nav float-right">
                        <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="#"
                                data-toggle="dropdown"><i class="ficon ft-mail"> </i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="arrow_box_right"><a class="dropdown-item" href="#"><i
                                            class="ft-book"></i> @lang('site.readMail')</a><a
                                        class="dropdown-item" href="#"><i class="ft-bookmark"></i>
                                        @lang('site.readLater')</a><a class="dropdown-item" href="#"><i
                                            class="ft-check-square"></i> @lang('site.markAllRead') </a></div>
                            </div>
                        </li>
                        <li class="dropdown dropdown-user nav-item"><a
                                class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                                <span class="avatar avatar-online"><img
                                        src="{{ asset('admin/theme-assets/images/portrait/small/avatar-s-19.png') }}"
                                        alt="avatar"><i></i></span></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="arrow_box_right"><a class="dropdown-item" href="#"><span
                                            class="avatar avatar-online"><img
                                                src="{{ asset('admin/theme-assets/images/portrait/small/avatar-s-19.png') }}"
                                                alt="avatar"><span class="user-name text-bold-700 ml-1">John
                                                Doe</span></span></a>
                                    <div class="dropdown-divider"></div><a class="dropdown-item" href="#"><i
                                            class="ft-user"></i> @lang('site.editProfile')</a><a
                                        class="dropdown-item" href="#"><i class="ft-mail"></i>
                                        @lang('site.myInbox')</a><a class="dropdown-item" href="#"><i
                                            class="ft-check-square"></i> @lang('site.task')</a><a class="dropdown-item"
                                        href="#"><i class="ft-message-square"></i> @lang('site.chats')</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="ft-power"></i> @lang('site.logout')
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
