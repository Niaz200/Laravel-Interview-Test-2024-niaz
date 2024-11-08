<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bytedash - Admin Template</title>

    <!-- favicon -->
    <link rel=icon href="html/favicons.png" sizes="16x16" type="icon/png">
    <!-- animate -->
    <link rel="stylesheet" href="{{asset('html/assets/css/animate.css')}}">
    <!-- bootstrap -->
    <link rel="stylesheet" href="{{asset('html/assets/css/bootstrap.min.css')}}">
    <!-- <link rel="stylesheet" href="{{asset('html/assets/css/bootstrap.css')}}"> -->
    <!-- All Icon -->
    <link rel="stylesheet" href="{{asset('html/assets/css/icon.css')}}">
    <!-- slick carousel  -->
    <link rel="stylesheet" href="{{asset('html/assets/css/slick.css')}}">
    <!-- Select2 Css -->
    <link rel="stylesheet" href="{{asset('html/assets/css/select2.min.css')}}">
    <!-- Sweet alert Css -->
    <link rel="stylesheet" href="{{asset('html/assets/css/sweetalert.css')}}">
    <!-- Flatpickr Css -->
    <link rel="stylesheet" href="{{asset('html/assets/css/flatpickr.min.css')}}">
    <!-- Country Select Css -->
    <link rel="stylesheet" href="{{asset('html/assets/css/niceCountryInput.css')}}">
    <link rel="stylesheet" href="{{asset('html/assets/css/jsuites.css')}}">
    <!-- Fancy box Css -->
    <link rel="stylesheet" href="{{asset('html/assets/css/fancybox.css')}}">
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{asset('html/assets/css/dashboard.css')}}">
    <!-- dark css -->


    <link href="{{asset('html/assets/css/toastify.min.css')}}" rel="stylesheet" />

    <script>
        // Check if token exists in localStorage
        if (localStorage.getItem('token') !== null) {
            // If not already on /resetPassword, redirect to /dashboard
            if (window.location.pathname !== "/resetPassword") {
                window.location.href = "/dashboard"; // Redirect to dashboard
            }
        }
    </script>




    <script src="{{asset('html/assets/js/toastify-js.js')}}"></script>



    <script src="{{asset('html/assets/js/axios.min.js')}}"></script>
    <script src="{{asset('html/assets/js/config.js')}}"></script>
    <script src="{{asset('html/assets/js/jquery-3.7.0.min.js')}}"></script>


</head>

<body>

    <!-- <div id="loader" class="LoadingOverlay d-none">
        <div class="Line-Progress">
            <div class="indeterminate"></div>
        </div>
    </div> -->


    <div>
        @yield('content')
    </div>




    <!-- jquery -->
    <!-- <script src="{{asset('html/assets/js/jquery-3.6.4.min.js')}}"></script> -->
    <!-- jquery Migrate -->
    <!-- <script src="{{asset('html/assets/js/jquery-migrate-3.4.1.min.js')}}"></script> -->
    <!-- bootstrap -->
    <script src="{{asset('html/assets/js/bootstrap.bundle.min.js')}}"></script>
    <!-- Slick Slider -->
    <script src="{{asset('html/assets/js/slick.js')}}"></script>
    <!-- Plugins Js -->
    <script src="{{asset('html/assets/js/plugin.js')}}"></script>

    <!-- Country Select Js -->
    <script src="{{asset('html/assets/js/niceCountryInput.js')}}"></script>
    <!-- Multiple Country Select Js -->
    <script src="{{asset('html/assets/js/jsuites.js')}}"></script>
    <!-- Fancy box Js -->
    <script src="{{asset('html/assets/js/fancybox.umd.js')}}"></script>
    <!-- main js -->
    <script src="{{asset('html/assets/js/main.js')}}"></script>


</body>

</html>