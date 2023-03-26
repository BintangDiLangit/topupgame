<!doctype html>
<html class="no-js" lang="en">

<head>
    @include('landing.head')
</head>

<body>


    <!-- scroll-top -->
    <button class="scroll__top scroll-to-target" data-target="html">
        <i class="flaticon-right-arrow"></i>
    </button>
    <!-- scroll-top-end-->

    <!-- header-area -->
    @include('landing.header')
    <!-- header-area-end -->



    <!-- main-area -->
    <main class="main--area">
        @yield('content')
    </main>
    <!-- main-area-end -->


    <!-- footer-start -->
    @include('landing.footer')
    <!-- footer-start-end -->



    <!-- JS here -->
    @include('landing.script')
    @stack('script')
</body>

</html>
