@extends('home.layouts.app')


@section('content')
    <main>
        <div class="main-section">
            <div class="container">
                <div class="main-section-data">
                    {{-- Start Stories section --}}
                    {{-- <div class="row stories">
                        <div class="col-lg-12 layout-spacing">
                            <div class="statbox widget box box-shadow">

                                <div class="widget-content widget-content-area">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div id="content_1" class="tabcontent story-area">
                                                <div class="story-container-1">
                                                    <div class="single-create-story">
                                                        <img src="https://bootdey.com/img/Content/avatar/avatar1.png"
                                                            class="single-create-story-bg">
                                                        <div class="create-story-author">
                                                            <i class="fa fa-plus-circle fa-2x text-info"></i>
                                                            <p>@lang('site.createStory')</p>
                                                        </div>
                                                    </div>


                                                    <div class="single-story">
                                                        <img src="https://bootdey.com/img/Content/avatar/avatar2.png"
                                                            class="single-story-bg">
                                                        <div class="story-author">
                                                            <img src="https://bootdey.com/img/Content/avatar/avatar2.png">
                                                            <p>John</p>
                                                        </div>
                                                    </div>

                                                    <div class="single-story">
                                                        <img src="https://bootdey.com/img/Content/avatar/avatar2.png"
                                                            class="single-story-bg">
                                                        <div class="story-author">
                                                            <img src="https://bootdey.com/img/Content/avatar/avatar2.png">
                                                            <p>John</p>
                                                        </div>
                                                    </div>
                                                    <div class="single-story">
                                                        <img src="https://bootdey.com/img/Content/avatar/avatar3.png"
                                                            class="single-story-bg">
                                                        <div class="story-author">
                                                            <img src="https://bootdey.com/img/Content/avatar/avatar3.png">
                                                            <p>Mike</p>
                                                        </div>
                                                    </div>
                                                    <div class="single-story">
                                                        <img src="https://bootdey.com/img/Content/avatar/avatar4.png"
                                                            class="single-story-bg">
                                                        <div class="story-author">
                                                            <img src="https://bootdey.com/img/Content/avatar/avatar4.png">
                                                            <p>Lisa</p>
                                                        </div>
                                                    </div>
                                                    <div class="single-story">
                                                        <img src="https://bootdey.com/img/Content/avatar/avatar5.png"
                                                            class="single-story-bg">
                                                        <div class="story-author">
                                                            <img src="https://bootdey.com/img/Content/avatar/avatar5.png">
                                                            <p>William</p>
                                                        </div>
                                                    </div>
                                                    <div class="single-story">
                                                        <img src="https://bootdey.com/img/Content/avatar/avatar6.png"
                                                            class="single-story-bg">
                                                        <div class="story-author">
                                                            <img src="https://bootdey.com/img/Content/avatar/avatar6.png">
                                                            <p>Jonthy</p>
                                                        </div>
                                                    </div>
                                                    <div class="single-story">
                                                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png"
                                                            class="single-story-bg">
                                                        <div class="story-author">
                                                            <img src="https://bootdey.com/img/Content/avatar/avatar7.png">
                                                            <p>Steve</p>
                                                        </div>
                                                    </div>
                                                    <div class="single-story">
                                                        <img src="https://bootdey.com/img/Content/avatar/avatar8.png"
                                                            class="single-story-bg">
                                                        <div class="story-author">
                                                            <img src="https://bootdey.com/img/Content/avatar/avatar8.png">
                                                            <p>Jenni</p>
                                                        </div>
                                                    </div>
                                                    <div class="single-story">
                                                        <img src="https://bootdey.com/img/Content/avatar/avatar1.png"
                                                            class="single-story-bg">
                                                        <div class="story-author">
                                                            <img src="https://bootdey.com/img/Content/avatar/avatar1.png">
                                                            <p>Sagarika</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    {{-- End Stories section --}}

                    <div class="row">

                        <div class="col-lg-3 col-md-4 pd-left-none no-pd">
                            <div class="main-left-sidebar no-margin">
                                <div class="user-data full-width">
                                    <div class="user-profile">
                                        <div class="username-dt">
                                            <div class="usr-pic">
                                                <img src="http://via.placeholder.com/100x100" alt="">
                                            </div>
                                        </div>
                                        <!--username-dt end-->
                                        <div class="user-specs">
                                            <h3>{{ Auth::user()->fname }} {{ Auth::user()->lname }}</h3>
                                            <span>{{ Auth::user()->info->bio }}</span>
                                        </div>
                                    </div>
                                    <!--user-profile end-->
                                    <ul class="user-fw-status">
                                        <li>
                                            <h4>@lang('site.following')</h4>
                                            <span>{{ Auth::user()->following->count() }}</span>
                                        </li>
                                        <li>
                                            <h4>@lang('site.followers')</h4>
                                            <span>{{ Auth::user()->followers->count() }}</span>
                                        </li>
                                        <li>
                                            <a href="{{ route('profile') }}" title="">@lang('site.viewProfile')</a>
                                        </li>
                                    </ul>
                                </div>
                                <!--user-data end-->
                                <div class="suggestions full-width">
                                    <div class="sd-title">
                                        <h3>@lang('site.suggestions')</h3>
                                        <i class="la la-ellipsis-v"></i>
                                    </div>
                                    <!--sd-title end-->
                                    <div class="suggestions-list">
                                        @foreach ($suggestionsUsers as $item)
                                            <div class="suggestion-usd">
                                                <img src="http://via.placeholder.com/35x35" alt="">
                                                <div class="sgt-text">
                                                    <h4>{{ $item->fname }} {{ $item->lname }}</h4>
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

                                <div class="tags-sec full-width">
                                    <ul>
                                        <li><a href="#" title="">Help Center</a></li>
                                        <li><a href="#" title="">About</a></li>
                                        <li><a href="#" title="">Privacy Policy</a></li>
                                        <li><a href="#" title="">Community Guidelines</a></li>
                                        <li><a href="#" title="">Cookies Policy</a></li>
                                        <li><a href="#" title="">Career</a></li>
                                        <li><a href="#" title="">Language</a></li>
                                        <li><a href="#" title="">Copyright Policy</a></li>
                                    </ul>
                                    <div class="cp-sec">
                                        <img style="max-width: 35px !important" src="{{ asset('home/images/logo.png') }}"
                                            alt="">
                                        <p><img src="{{ asset('home/images/cp.png') }}" alt="">Copyright 2022</p>
                                    </div>
                                </div>
                                <!--tags-sec end-->
                            </div>
                            <!--main-left-sidebar end-->
                        </div>
                        <div class="col-lg-6 col-md-8 no-pd">
                            <div class="main-ws-sec">

                                <div class="post-topbar">
                                    <div class="user-picy">
                                        <img src="http://via.placeholder.com/100x100" alt="">
                                    </div>
                                    <div class="post-st">
                                        <ul>
                                            <li><a class="post_project active" href="#" title="">@lang('site.post')</a></li>
                                            <li><a class="post-jb" href="#" title="">@lang('site.postmedia')</a></li>
                                        </ul>
                                    </div>
                                    <!--post-st end-->
                                </div>
                                <!--post-topbar end-->


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
                                <!--posts-section end-->
                            </div>
                            <!--main-ws-sec end-->
                        </div>
                        <div class="col-lg-3 pd-right-none no-pd">
                            <div class="right-sidebar">
                                <div class="widget widget-about" style="margin-bottom: 15px;">
                                    <img src="images/wd-logo.png" alt="">
                                    <h3>@lang('site.title')</h3>
                                    <span>@lang('site.about')</span>

                                </div>
                                <!--widget-about end-->
                                <div class="widget widget-posts" style="margin-bottom: 15px;">
                                    <div class="sd-title">
                                        <h3>@lang('site.news')</h3>
                                        <i class="la la-ellipsis-v"></i>
                                    </div>
                                    <div class="posts-list">
                                        @foreach ($news as $item)
                                            <div class="post-info">
                                                <div class="post-details">
                                                    <a href="{{ route('posts.show', ['post' => $item->id]) }}">
                                                        <h3>{{ $item->user->fullName() }}</h3>
                                                        <p>{{ Str::of($item->content)->limit(25) }}</p>
                                                    </a>
                                                </div>
                                                <div class="hr-rate">
                                                    <span></span>
                                                </div>
                                            </div>
                                        @endforeach


                                    </div>
                                    <!--posts-list end-->
                                </div>
                                <!--widget-posts end-->
                                <div class="widget widget-posts">
                                    <div class="sd-title">
                                        <h3>@lang('site.projects')</h3>
                                        <i class="la la-ellipsis-v"></i>
                                    </div>
                                    <div class="posts-list">
                                        @foreach ($projects as $project)
                                            <div class="post-info">
                                                <div class="post-details">
                                                    <a href="{{ route('posts.show', ['post' => $project->id]) }}">
                                                        <h3>{{ $project->user->fullName() }}</h3>
                                                        <p>{{ Str::of($project->content)->limit(25) }}</p>
                                                    </a>
                                                </div>
                                                <div class="hr-rate">
                                                    <span></span>
                                                </div>
                                            </div>
                                        @endforeach
                                        <!--post-info end-->
                                    </div>
                                    <!--posts-list end-->
                                </div>
                                <!--widget-posts end-->

                            </div>
                            <!--right-sidebar end-->
                        </div>
                    </div>


                </div><!-- main-section-data end-->
            </div>
        </div>
    </main>



    <div class="post-popup pst-pj">
        <div class="post-project">
            <h3>@lang('site.add') @lang('site.post')</h3>
            <div class="post-project-fields">
                <form action="{{ route('posts.store') }}" method="Post">
                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="col-lg-12">
                            @include('home.layouts._error')
                        </div>
                        <div class="col-lg-2">
                            <label for="">Type</label>
                        </div>
                        <div class="col-lg-10">
                            <div class="inp-field">
                                <select name="type" id="type">
                                    <option selected value="post">Post</option>
                                    @if (Auth::user()->hasRole('super_admin') || Auth::user()->hasRole('admin'))
                                        <option value="news">News</option>
                                    @endif
                                    @if (Auth::user()->hasRole('super_admin') || Auth::user()->hasRole('admin') || Auth::user()->hasRole('teacher'))
                                        <option value="lecture">Lecutre</option>
                                    @endif
                                    <option value="project">Project</option>
                                </select>
                            </div>
                        </div>
                        <div id="collegeCourse" class="collegeCourse row hidden" style="width:100%">
                            <div class="col-lg-2">
                                <label for=""></label>
                            </div>
                            <div class="col-lg-5">
                                <div class="inp-field">
                                    <select class="" id="subcategory" name="college">
                                        <option value="">College</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="inp-field">
                                    <select id="subcategory2" name="course">
                                        <option value="">Course</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <label for="">Privacy</label>
                        </div>
                        <div class="col-lg-6">
                            <div class="inp-field">
                                <select name="privacy">
                                    <option selected>Public</option>
                                    <option>Followers</option>
                                    <option>Only me</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <textarea class="summernote" name="content" placeholder="Add Your Post Here !"></textarea>
                        </div>
                        <div class="col-lg-12">
                            <ul>
                                <li><button class="active" type="submit" value="post">Post</button></li>
                                <li><a href="#" title="">Cancel</a></li>
                            </ul>
                        </div>
                    </div>
                </form>
            </div>
            <!--post-project-fields end-->
            <a href="#" title=""><i class="la la-times-circle-o"></i></a>
        </div>
        <!--post-project end-->
    </div>
    <!--post-project-popup end-->

    {{-- Post media --}}
    <div class="post-popup post_post">
        <div class="post-project">
            <h3>@lang('site.postmedia')</h3>
            <div class="post-project-fields">
                <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="row">

                        <div class="col-lg-12">
                            @include('home.layouts._error')
                        </div>
                        <div class="col-lg-2">
                            <label for="">Type</label>
                        </div>
                        <div class="col-lg-10">
                            <div class="inp-field">
                                <select name="type" id="mediatype">
                                    <option selected value="post">Post</option>
                                    @if (Auth::user()->hasRole('super_admin') || Auth::user()->hasRole('admin'))
                                        <option value="news">News</option>
                                    @endif
                                    @if (Auth::user()->hasRole('super_admin') || Auth::user()->hasRole('admin') || Auth::user()->hasRole('teacher'))
                                        <option value="lecture">Lecutre</option>
                                    @endif
                                    <option value="project">Project</option>
                                </select>
                            </div>
                        </div>
                        <div id="mediacollegeCourse" class="mediacollegeCourse row hidden" style="width:100%">
                            <div class="col-lg-2">
                                <label for=""></label>
                            </div>
                            <div class="col-lg-5">
                                <div class="inp-field">
                                    <select class="" id="mediasubcategory" name="college">
                                        <option value="">College</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="inp-field">
                                    <select id="mediasubcategory2" name="course">
                                        <option value="">Course</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <label for="">Privacy</label>
                        </div>
                        <div class="col-lg-6">
                            <div class="inp-field">
                                <select name="privacy">
                                    <option selected>Public</option>
                                    <option>Followers</option>
                                    <option>Only me</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <textarea class="summernote" name="content" placeholder="Add Your Post Here !"></textarea>
                        </div>
                        <div class="col-lg-12">
                            <input type="file" name="files[]" multiple placeholder="Files or Images">
                        </div>
                        <div class="col-lg-12">
                            <ul>
                                <li><button class="active" type="submit" value="post">Post</button></li>
                                <li><a href="#" title="">Cancel</a></li>
                            </ul>
                        </div>
                    </div>
                </form>
            </div>
            <!--post-project-fields end-->
            <a href="#" title=""><i class="la la-times-circle-o"></i></a>
        </div>
        <!--post-project end-->
    </div>
    <!--post-project-popup end-->
@endsection


@push('lecture-scripts')
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function() {
            $('#type').on('change', function(e) {
                var type = e.target.value;
                var element = document.getElementById("collegeCourse");
                if (type == 'lecture') {
                    element.classList.remove("hidden");
                    var c = {!! $colleges->toJson() !!};
                    $('#subcategory').empty();
                    $.each(c, function(index, subcategory) {
                        $('#subcategory').append('<option value="' + subcategory.id + '">' +
                            subcategory
                            .name + '</option>');
                    })
                } else {
                    element.classList.add("hidden");

                }

            })
        });

        $(document).ready(function() {
            $('#subcategory').on('change', function(e) {
                var cat_id = e.target.value;
                $.ajax({
                    url: "{{ route('coursesList') }}",
                    type: "POST",
                    data: {
                        cat_id: cat_id
                    },
                    success: function(data) {
                        $('#subcategory2').empty();
                        $.each(data.subcategories[0].courses, function(index,
                            subcategory) {
                            $('#subcategory2').append('<option value="' + subcategory
                                .id + '">' + subcategory.name + '</option>');
                        })
                    }
                })
            });
        });


        // media
        $(document).ready(function() {
            $('#mediatype').on('change', function(e) {
                var type = e.target.value;
                var element = document.getElementById("mediacollegeCourse");
                if (type == 'lecture') {
                    element.classList.remove("hidden");
                    var c = {!! $colleges->toJson() !!};
                    $('#mediasubcategory').empty();
                    $.each(c, function(index, subcategory) {
                        $('#mediasubcategory').append('<option value="' + subcategory.id + '">' +
                            subcategory
                            .name + '</option>');
                    })
                } else {
                    element.classList.add("hidden");

                }

            })
        });

        $(document).ready(function() {
            $('#mediasubcategory').on('change', function(e) {
                var cat_id = e.target.value;
                $.ajax({
                    url: "{{ route('coursesList') }}",
                    type: "POST",
                    data: {
                        cat_id: cat_id
                    },
                    success: function(data) {
                        $('#mediasubcategory2').empty();
                        $.each(data.subcategories[0].courses, function(index,
                            subcategory) {
                            $('#mediasubcategory2').append('<option value="' +
                                subcategory
                                .id + '">' + subcategory.name + '</option>');
                        })
                    }
                })
            });
        });
    </script>
@endpush
