@extends('home.layouts.app')


@section('content')
    <section class="forum-page">
        <div class="container">
            <div class="forum-questions-sec">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="forum-questions">
                            @if ($lectures->count() > 0)
                                @foreach ($lectures as $lecture)
                                    <div class="usr-question">
                                        <div class="usr_quest">
                                            <h3><i class="fa fa-book"></i> {{ $lecture->title }}</h3>

                                        </div>
                                        <!--usr_quest end-->
                                        <span class="quest-posted-time" style="bottom: unset !important;"><i
                                                class="fa fa-clock-o"></i>{{ $lecture->created_at->diffforhumans() }}</span>
                                        <div class="epi-sec">
                                            <ul class="descp">
                                                <li><img src="{{ asset('home/images/icon8.png') }}"
                                                        alt=""><span>Lectures</span></li>
                                                <li><img src="{{ asset('home/images/icon9.png') }}" alt=""><span></span>
                                                </li>
                                            </ul>
                                            <ul class="bk-links">
                                                <li><a href="" title=""><i class="la la-link"></i></a></li>
                                                <li><a href="#" title=""><i class="la la-share"></i></a></li>
                                            </ul>

                                            <div class="react-links">
                                                {!! $lecture->post->content !!}

                                                @if ($lecture->post->withFiles())
                                                    <ul class="quest-tags">
                                                        @foreach ($lecture->post->files as $file)
                                                            <li><a href="{{ route('getDownload', [$lecture->post->id,$file->file]) }}" title="" target="_blank"><i class="fa fa-download"></i> {{ $file->file }}</a></li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </div>

                                        </div>

                                    </div>

                                    <!--usr-question end-->
                                @endforeach
                            @else
                                <div class="post-bar">
                                    <div class="post_topbar">
                                        <h3>No Lecture to show</h3>
                                    </div>
                                </div>
                            @endif

                        </div>
                        <!--forum-questions end-->

                    </div>
                    <div class="col-lg-4">
                        <div class="widget widget-user">
                            <h3 class="title-wd"><i class="fa fa-university"></i> {{Auth::user()->college->name }} Courses <br><span style="font-size: medium;
                                font-style: italic;
                                padding-left: 25px;">Latest Added Lectures</span></h3>
                            <ul>
                                @foreach ($lectures as $lecture)
                                <li>
                                    <div class="usr-msg-details">
                                        <div class="usr-ms-img">
                                            <i class="fa fa-book"></i>
                                        </div>
                                        <div class="usr-mg-info">
                                            <h3>{{$lecture->course->name}} : {{$lecture->title}}</h3>
                                            <p>{{$lecture->post->user->username}}</p>
                                        </div>
                                        <!--usr-mg-info end-->
                                    </div>
                                    <span><img src="{{ asset('home/images/price1.png') }}" alt=""></span>
                                </li>
                                @endforeach


                            </ul>
                        </div>
                        <!--widget-user end-->

                    </div>
                </div>
            </div>
            <!--forum-questions-sec end-->
        </div>
    </section>
    <!--forum-page end-->
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
