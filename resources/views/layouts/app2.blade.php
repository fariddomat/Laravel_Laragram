<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons' rel="stylesheet">

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
</head>

<body>
    <div id="app">
        <v-toolbar fixed color="white">
            <v-app-bar-nav-icon></v-app-bar-nav-icon>
            <v-toolbar-title> Private Chat</v-toolbar-title>
            <v-spacer></v-spacer>
            <v-toolbar-items class="hidden-sm-and-down">
                @guest
                    <v-btn  href="{{ route('login') }}">Login</v-btn>
                    <v-btn  href="{{ route('register') }}">Register</v-btn>
                @else
                    <v-btn  href="{{ route('home') }}"> Group</v-btn>
                    <v-btn  href="{{ route('private') }}"> Private</v-btn>
                    <v-btn > {{ Auth::user()->fname }}</v-btn>
                    <v-btn  @click=" $refs.logoutForm.submit(); ">
                        Logout</v-btn>
                @endguest
                <form ref="logoutForm" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf
                </form>
            </v-toolbar-items>
        </v-toolbar>

        <main class="mt-5">
            <v-container fluid>
                @yield('content')
            </v-container>
        </main>
    </div>
</body>

</html>
