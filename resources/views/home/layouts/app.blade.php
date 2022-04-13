<!DOCTYPE html>
<html>

@include('home.layouts.head')

<body>
    <div class="wrapper">
        @include('home.layouts.header')
        
        @yield('content')

        @include('home.layouts.chat')
        @include('home.layouts.footer')
</body>

</html>
