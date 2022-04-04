<!DOCTYPE html>
<html>

@include('home.layouts.head')

<body class="sign-in">
    <div class="wrapper">
        <div class="sign-in-page">
            <div class="signin-popup">
                <div class="signin-pop">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="cmp-info">
                                <div class="cm-logo">
                                    <img src="" alt="">
                                    <p>Laragram, is a global platform and social networking where studensts
                                        and professors connect and collaborate remotely</p>
                                </div>


                                <!--cm-logo end-->
                                <img src="{{ asset('home/images/cm-main-img.png') }}" alt="">
                            </div>
                            <!--cmp-info end-->
                        </div>
                        <div class="col-lg-6">
                            <div class="login-sec">
                                <ul class="sign-control">
                                    <li data-tab="tab-1" class="current"><a href="#" title="">Sign in</a></li>
                                    <li data-tab="tab-2"><a href="#" title="">Sign up</a></li>
                                </ul>
                                <div style="padding-top: 75px;">@include('home.layouts._error')</div>
                                @isset($message)
                                <div class="header bg-danger text-white p-10" style="margin-top: 15px; padding: 10px; border-radius: 15px">

                                    {{$message}}
                                </div>
                                @endisset

                                <div class="sign_in_sec current" id="tab-1">

                                    <h3>Sign in</h3>
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-12 no-pdd">
                                                <div class="sn-field">
                                                    <input class="form-control" type="text" name="email"
                                                        placeholder="Email" value="{{ old('email') }}">
                                                    <i class="fa fa-envelope"></i>

                                                </div>


                                                <!--sn-field end-->
                                            </div>

                                            <div class="col-lg-12 no-pdd">
                                                <div class="sn-field">
                                                    <input class="form-control" type="password" name="password"
                                                        placeholder="Password" autocomplete="current-password">
                                                    <i class="la la-lock"></i>

                                                </div>
                                            </div>
                                            {{-- <div class="col-lg-12 no-pdd">
                                                <div class="checky-sec">
                                                    <div class="fgt-sec">
                                                        <input type="checkbox" name="remember_me" id="c1">
                                                        <label for="c1">
                                                            <span></span>
                                                        </label>
                                                        <small>Remember me</small>
                                                    </div>
                                                    <!--fgt-sec end-->
                                                    <a href="#" title="">Forgot Password?</a>
                                                </div>
                                            </div> --}}
                                            <div class="col-lg-12 no-pdd">
                                                <button type="submit" value="submit">Sign in</button>
                                            </div>
                                        </div>
                                    </form>

                                    <!--login-resources end-->
                                </div>
                                <!--sign_in_sec end-->
                                <div class="sign_in_sec" id="tab-2">

                                    <!--signup-tab end-->
                                    <div class="dff-tab current" id="tab-3">
                                        <form method="POST" action="{{ route('registerStudent') }}">
                                            @csrf
                                            @method('POST')
                                            <div class="row">
                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field">
                                                        <input type="text" name="uid" placeholder="University id">
                                                        <i class="la la-user"></i>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field">
                                                        <input type="text" name="fname" placeholder="First name">
                                                        <i class="la la-user"></i>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field">
                                                        <input type="text" name="lname" placeholder="Last name">
                                                        <i class="la la-user"></i>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field">
                                                        <input type="text" name="email" placeholder="Email">
                                                        <i class="fa fa-envelope"></i>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field">
                                                        <select name="college_id">
                                                            @foreach ($colleges as $item)
                                                                <option value="{{ $item->id }}">{{ $item->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        <i class="la la-dropbox"></i>
                                                        <span><i class="fa fa-ellipsis-h"></i></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field">
                                                        <input type="password" name="password" placeholder="Password">
                                                        <i class="la la-lock"></i>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12 no-pdd">
                                                    <button type="submit" value="submit">Get Started</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <!--dff-tab end-->
                                </div>
                            </div>
                            <!--login-sec end-->
                        </div>
                    </div>
                </div>
                <!--signin-pop end-->
            </div>
            <!--signin-popup end-->
            <div class="footy-sec">
                <div class="container">
                    <ul>
                        <li><a href="#" title="">Laragram</a></li>
                    </ul>
                    <p><img src="images/copy-icon.png" alt="">Copyright 2022</p>
                </div>
            </div>
            <!--footy-sec end-->
        </div>
        <!--sign-in-page end-->

    </div>

        @include('home.layouts.footer')
</body>

</html>
