<!DOCTYPE html>
<html lang="en">

<!--================ Head =================-->
@include('theme.partials.head')
<!--================ Head =================-->

<body>
    <!--================Header Menu Area =================-->
    @include('theme.partials.header')
    <!--================Header Menu Area =================-->

    

    <!--================ Start Content Post Area =================-->
    @yield('content')
    <!--================ End Content Post Area =================-->

    <!--================ Start Footer Area =================-->
    @include('theme.partials.footer')
    <!--================ End Footer Area =================-->

    <!--================ Start Scripts Area =================-->
    @include('theme.partials.scripts')
    <!--================ End Scripts Area =================-->
</body>

</html>
