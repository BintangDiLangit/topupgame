<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.layouts.head')
</head>

<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MMCL864" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    {{-- Wrapper Start --}}
    <div id="main-wrapper">

        {{-- Nav Header Start --}}
        @include('admin.layouts.navbar')
        {{-- Nav Header End --}}

        <!--**********************************
            Header start
        ***********************************-->

        <!--**********************************
    Chat box start
***********************************-->

        <!--**********************************
    Chat box End
***********************************-->




        <!--**********************************
    Header start
***********************************-->
        @include('admin.layouts.header')
        <!--**********************************
    Header end ti-comment-alt
***********************************-->

        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <!--**********************************
 Sidebar start
***********************************-->
        @include('admin.layouts.sidebar')
        <!--**********************************
 Sidebar end
***********************************-->
        <!--**********************************
            Sidebar end
        ***********************************-->



        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->

            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->

        <!--**********************************
  Footer start
***********************************-->
        @include('admin.layouts.footer')
        <!--**********************************
  Footer end
***********************************-->
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    {{-- Main Wrapper End --}}

    <!--**********************************
        Scripts
    ***********************************-->
    @include('admin.layouts.script')
</body>

</html>
