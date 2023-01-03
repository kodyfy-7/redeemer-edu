<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>@yield('title') ::: {{ config('app.name', 'Laravel') }}</title>

    <link rel="shortcut icon" href="{{ asset('panel/assets/img/favicon.png') }}">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;0,600;0,700;1,400&amp;display=swap">

    <link rel="stylesheet" href="{{ asset('panel/assets/plugins/bootstrap/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('panel/assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="as{{ asset('panel/sets/plugins/fontawesome/css/all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('panel/assets/css/style.css') }}">
</head>
<body>

<div class="main-wrapper login-body">
    <div class="login-wrapper">
        <div class="container">
            <div class="loginbox">
                <div class="login-left">
                    <img class="img-fluid" src="https://res.cloudinary.com/uche-9ijakids/image/upload/v1663322573/200x200_qahr7h.png" alt="Logo">
                </div>
                <div class="login-right">
                    <div class="login-right-wrap">
                        <h1>@yield('sub-title')</h1>
                        <p class="account-subtitle">Access to school portal</p>

                        @yield('content')

                        <div class="text-center forgotpass"><a href="forgot-password.html">Forgot Password?</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="{{ asset('panel/assets/js/jquery-3.6.0.min.js') }}"></script>

<script src="{{ asset('panel/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<script src="{{ asset('panel/assets/js/script.js') }}"></script>
</body>

<!-- Mirrored from preschool.dreamguystech.com/template/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 06 Sep 2022 21:57:01 GMT -->
</html>
