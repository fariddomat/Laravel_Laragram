<head>
    <meta charset="UTF-8">
    <title>LARAGRAM</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('home/logo.ico') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('home/css/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('home/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('home/css/line-awesome.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('home/css/line-awesome-font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('home/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('home/css/jquery.mCustomScrollbar.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('home/lib/slick/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('home/lib/slick/slick-theme.css') }}">

    @if (Auth::check())

    <link rel="stylesheet" type="text/css" href="{{ asset('home/css/'.Auth::user()->style.'/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('home/css/'.Auth::user()->style.'/responsive.css') }}">
    @else
        <link rel="stylesheet" type="text/css" href="{{ asset('home/css/1/style.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('home/css/1/responsive.css') }}">
    @endif

    <link rel="stylesheet" type="text/css" href="{{ asset('home/css/tailwind.min.css') }}">
    <link type="text/css" href="{{ asset('admin/theme-assets/fonts/flag-icon-css/css/flag-icon.min.css') }}"
        rel="stylesheet">
    <!--  Swiper's CSS -->
    {{-- <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" /> --}}
    <link rel="stylesheet" href="{{ asset('home/css/swiper-bundle.min.css') }}" />

    <link href="{{ asset('plugins/easyautocomplete/easy-autocomplete.min.css') }}" rel="stylesheet">

    <style>
        .widget-feat {
            padding: 25px 20px !important;
            margin-bottom: 20px !important;
        }

        .social-link-li {
            display: flex !important;
            padding: 8px 0 !important;
            border-bottom: 0px !important;
        }

        .social-link-li i {
            padding: 12px !important;
            font-size: 18px !important;
        }


        .invalid-feedback {
            display: contents
        }

        .post-img {
            max-width: 100% !important;
            max-height: 450px !important;
            margin-bottom: 15px;
            border-radius: 10px;
        }

        main {
            padding: 25px 0 !important;
        }

        .stories {
            margin-bottom: 30px !important;
        }

        .widget {
            padding: 0;
            margin-top: 0;
            margin-bottom: 0;
            border-radius: 6px;
            -webkit-box-shadow: 0 4px 6px 0 rgb(85 85 85 / 8%), 0 1px 20px 0 rgb(0 0 0 / 7%), 0px 1px 11px 0px rgb(0 0 0 / 7%);
            -moz-box-shadow: 0 4px 6px 0 rgba(85, 85, 85, 0.08), 0 1px 20px 0 rgba(0, 0, 0, 0.07), 0px 1px 11px 0px rgba(0, 0, 0, 0.07);
            box-shadow: 0 4px 6px 0 rgb(85 85 85 / 8%), 0 1px 20px 0 rgb(0 0 0 / 7%), 0px 1px 11px 0px rgb(0 0 0 / 7%);
        }

        .widget.box .widget-header {
            background: #fff;
            padding: 0px 8px 0px;
            border-top-right-radius: 6px;
            border-top-left-radius: 6px;
        }

        .widget .widget-header {
            border-bottom: 0px solid #f1f2f3;
        }

        .widget.box .widget-header {
            background: #fff;
            padding: 0px 8px 0px;
            border-top-right-radius: 6px;
            border-top-left-radius: 6px;
        }

        .widget .widget-header {
            border-bottom: 0px solid #f1f2f3;
        }

        .widget .widget-header:after {
            clear: both;
        }

        .widget .widget-header:before,
        .widget .widget-header:after {
            display: table;
            content: "";
            line-height: 0;
        }

        .widget-content-area {
            padding: 20px;
            position: relative;
            background-color: #fff;
            border-bottom-left-radius: 6px;
            border-bottom-right-radius: 6px;
        }

        .story-container-1 {
            display: flex;
            align-items: center;
            justify-content: flex-start;
        }

        .story-container-1 .single-create-story {
            height: 175px;
            width: 110px;
            border-radius: 10px;
            overflow: hidden;
            position: relative;
            margin-right: 10px;
            margin-bottom: 10px;
            background: #e4e4e4;
            text-align: center;
        }

        img.single-create-story-bg {
            width: 100%;
            height: 120px;
            object-fit: cover;
        }

        .create-story-author img {
            height: 40px;
            width: 40px;
            margin-top: -20px;
            padding: 4px;
            background: #e4e4e4;
            border-radius: 50%;
        }

        .story-container-1 .single-story {
            height: 175px;
            width: 110px;
            border-radius: 10px;
            overflow: hidden;
            position: relative;
            margin-right: 10px;
            margin-bottom: 10px;
        }

        .story-container-1 .single-story::before {
            content: "";
            position: absolute;
            top: 0;
            bottom: 0;
            right: 0;
            left: 0;
            background-image: linear-gradient(rgb(255 0 0 / 0%), black);
        }

        img.single-story-bg {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .story-container-1 .story-author {
            position: absolute;
            top: 50%;
            left: 0px;
            transform: translateY(-50%);
            right: 0px;
            text-align: center;
            z-index: 99;
            cursor: pointer;
        }

        .story-author img {
            height: 60px;
            width: 60px;
            border-radius: 50%;
            border: 1px solid white;
            padding: 4px;
        }

        .story-container-1 .story-author p {
            color: #fff;
            width: 100%;
            margin: 5px 0px 0px 0px;
            font-weight: 600;
            font-size: 12px;
        }

        .create-story-author p {
            margin: 0px;
            font-size: 13px;
            font-weight: 500;
        }

        .user-pro-img img {
            margin: 0 auto;
        }

    </style>
    @if (app()->getLocale() == 'ar')
        <link rel="stylesheet" href="{{ asset('admin/assets/css/style-rtl.css') }}">
        <link rel="stylesheet" href="{{ asset('admin/assets/css/bootstrap-rtl.min.css') }}">
        <link rel="stylesheet" href="{{ asset('admin/assets/css/rtl.css') }}">
        {{-- <link rel="stylesheet" href="{{ asset('dist/css/rtl.css') }}"> --}}
        <style>
            .ct-time {
                left: 10px !important;
                right: unset !important;
            }

            .usr_quest i {
                /* padding: 0 25px 0 5px !important; */
            }

            .danger1 {
                float: left !important;
            }

            .sd-title h3 {
                width: 100%
            }

            .main-menu {
                direction: rtl;
                text-align: right;
                right: 0;
            }

            .social_links {
                direction: ltr;
            }

            .wd-heady h3 {
                float: right;
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

            .suggestions-list {
                text-align: left
            }

            .slick-list {
                direction: ltr;
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

    <style>
        .easy-autocomplete-container ul li div {
            display: flow-root !important;
        }



    </style>
    <!-- include summernote css/js -->
    <link href="{{ asset('home/summernote-0.8.18-dist/summernote-bs4.min.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('home/css/summernote-bs4.min.css') }}" rel="stylesheet"> --}}
</head>
