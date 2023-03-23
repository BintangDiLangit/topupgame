<!DOCTYPE html>
<html lang="en" class="h-100">

<head>

    <meta charset="utf-8">
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="robots" content="" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta property="og:title" content="Zenix - Crypto Admin Dashboard" />
    <meta property="og:description" content="Zenix - Crypto Admin Dashboard" />
    <meta property="og:image" content="https://zenix.dexignzone.com/xhtml/page-error-404.html" />
    <meta name="format-detection" content="telephone=no">
    <title>BIMY | Login</title>
    <meta name="description" content="Some description for the page" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('public/images/favicon.png') }}">
    <link href="{{ asset('public/css/style.css') }}" rel="stylesheet">


</head>

<body class="vh-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <div class="text-center mb-3">
                                        <img src="public/images/logo-full-black.png" alt="">
                                    </div>
                                    <h4 class="text-center mb-4">Sign in your account</h4>
                                    <form action="{{ route('loginol') }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label class="mb-1"><strong>Email</strong></label>
                                            <input type="email" class="form-control" name="email" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1"><strong>Password</strong></label>
                                            <input type="password" class="form-control" name="password" required>
                                        </div>
                                        <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox ms-1">
                                                    <input type="checkbox" class="form-check-input"
                                                        id="basic_checkbox_1">
                                                    <label class="form-check-label" for="basic_checkbox_1">Remember my
                                                        preference</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <a href="page-forgot-password.html">Forgot Password?</a>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block">Sign Me In</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('public/vendor/global/global.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('public/js/custom.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/js/deznav-init.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/js/demo.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/js/styleSwitcher.js') }}" type="text/javascript"></script>
</body>

</html>
