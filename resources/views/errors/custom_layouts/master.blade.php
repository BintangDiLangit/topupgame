<!doctype html>
<html class="no-js" lang="en">

<!-- Mirrored from themedox.com/demo/mykd/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 11 Mar 2023 18:44:27 GMT -->

<head>
    @include('landing.head')
</head>

<body>


    <!-- scroll-top -->
    <button class="scroll__top scroll-to-target" data-target="html">
        <i class="flaticon-right-arrow"></i>
    </button>
    <!-- scroll-top-end-->


    <!-- main-area -->
    <main class="main--area">
        @yield('content')
    </main>
    <!-- main-area-end -->



    <!-- JS here -->
    @include('landing.script')
    @stack('script')
</body>


<!-- Mirrored from themedox.com/demo/mykd/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 11 Mar 2023 18:44:27 GMT -->

</html>
