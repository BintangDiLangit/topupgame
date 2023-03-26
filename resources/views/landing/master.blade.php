<!doctype html>
<html class="no-js" lang="en">

<head>
    @include('landing.head')
</head>

<body>

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MMCL864" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
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
