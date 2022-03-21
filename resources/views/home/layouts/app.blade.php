<!DOCTYPE html>
<html>

@include('home.layouts.head')

<body>


    <div class="wrapper">

        @include('home.layouts.header')
        <!-- Navbar -->


        @yield('content')

        @include('home.layouts.chat')
        @include('home.layouts.footer')
</body>

</html>
