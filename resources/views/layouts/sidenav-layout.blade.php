<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bytedash - Admin Template</title>

    <!-- favicon -->
    <link rel=icon href="{{asset('css/bootstrap.css')}}html/favicons.png" sizes="16x16" type="icon/png">
    <!-- animate -->
    <link rel="stylesheet" href="{{asset('html/assets/css/animate.css')}}">
    <link href="{{asset('html/assets/css/bootstrap.css')}}" rel="stylesheet" />
    <!-- bootstrap -->
    <link rel="stylesheet" href="{{asset('html/assets/css/bootstrap.min.css')}}">
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
    <!-- Fancy box Css -->
    <link rel="stylesheet" href="{{asset('html/assets/css/fancybox.css')}}">
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{asset('html/assets/css/dashboard.css')}}">
    <!-- dark css -->
    <!-- <link href="{{asset('html/assets/css/jquery.dataTables.min.css')}}" rel="stylesheet" /> -->
    <link href="{{asset('html/assets/css/toastify.min.css')}}" rel="stylesheet" />

    <script>
        if(localStorage.getItem('token')==null){
            window.location.href="/userLogin";
        }

    </script>

    <script src="{{asset('html/assets/js/jquery-3.7.0.min.js')}}"></script>
     
 <!-- <script src="{{asset('html/assets/js/jquery-3.6.0.min.js')}}"></script> -->
    <!-- <script src="{{asset('html/assets/js/jquery.dataTables.min.js')}}"></script> -->

    <script src="{{asset('html/assets/js/toastify-js.js')}}"></script>

    <script src="{{asset('html/assets/js/axios.min.js')}}"></script>
    <script src="{{asset('html/assets/js/config.js')}}"></script>
    
  

</head>

<body>

    <!-- preloader area start -->
    <!-- <div class="preloader" id="preloader">
        <div class="preloader-inner">
            <div class="loader_bars">
                <span></span>
            </div>
        </div>
    </div> -->

    <!-- <div id="loader" class="LoadingOverlay d-none">
        <div class="Line-Progress">
            <div class="indeterminate"></div>
        </div>
    </div> -->
    <!-- preloader area end -->

    <!-- Dashboard start -->
    



    <div class="container-fluid p-0">
        <div class="dashboard__contents__wrapper">
            <div class="dashboard__left dashboard-left-content">
                <div class="dashboard__left__main">
                    <div class="dashboard__left__close close-bars"><i class="fa-solid fa-times"></i></div>
                    <div class="dashboard__top">
                        <div class="dashboard__top__logo">
                            <a href="index.html">
                                <img class="main_logo" src="{{asset('html/assets/img/logo.webp')}}" alt="logo">
                                <img class="iocn_view__logo" src="html/assets/img/Favicon.png" alt="logo_icon">
                            </a>
                        </div>
                    </div>
                    <div class="dashboard__bottom mt-5">
                        <div class="dashboard__bottom__search mb-3">
                            <input class="form--control  w-100" type="text" placeholder="Search here..." id="search_sidebarList">
                        </div>
                        <ul class="dashboard__bottom__list dashboard-list">
                            <li class="dashboard__bottom__list__item has-children show open active">
                                <a href="{{url('/dashboard')}}"><i class="material-symbols-outlined">dashboard</i> <span class="icon_title">Dashboard</span></a>

                            </li>

                            <li class="dashboard__bottom__list__item ">

                                <a href="{{url('/countryPage')}}"><span class="icon_title">Country</span></a>
                            </li>

                            <li class="dashboard__bottom__list__item ">

                                <a href="{{url('/statePage')}}"><span class="icon_title">State</span></a>
                            </li>

                            <li class="dashboard__bottom__list__item ">

                                <a href="{{url('/cityPage')}}"><span class="icon_title">City</span></a>
                            </li>

                            <li class="dashboard__bottom__list__item has-children">
                                <a href="javascript:void(0)"><i class="material-symbols-outlined">group</i> <span class="icon_title">User</span></a>
                                <ul class="submenu">
                                    <li class="dashboard__bottom__list__item">
                                        <a href="{{url('/userProfile')}}">Profile</a>
                                    </li>
                                  
                                    <!-- <li class="dashboard__bottom__list__item">
                                        <a href="forgot_password.html">Reset Password</a>
                                    </li> -->
                                    
                                </ul>
                            </li>
                            <li class="dashboard__bottom__list__item">
                                <!-- <a href="{{url("/api/logout")}}"><i class="material-symbols-outlined">logout</i> <span class="icon_title">Log Out</span></a> -->
                                <a href="#" onclick="logout()" ><i class="material-symbols-outlined">logout</i> <span class="icon_title">Log Out</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="dashboard__right">
                <div class="dashboard__header single_border_bottom">
                    <div class="row gx-4 align-items-center justify-content-between">
                        <div class="col-sm-2">
                            <div class="dashboard__header__left">
                                <div class="dashboard__header__left__inner">
                                    <span class="dashboard__sidebarIcon d-none d-lg-block"></span>
                                    <span class="dashboard__sidebarIcon__mobile sidebar-icon d-lg-none"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 d-none d-sm-block">
                            <div class="dashboard__header__middle">
                                <div class="dashboard__header__middle__search">
                                    <div class="dashboard__header__middle__search__item">
                                        <input class="form--control radius-5" type="text" placeholder="Search anything...">
                                        <button class="search_icon"><i class="material-symbols-outlined">search</i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="dashboard__header__right">
                                <div class="dashboard__header__right__flex">
                                    <div class="dashboard__header__right__item responsive_search">
                                        <a href="javascript:void(0)" class="dashboard__search__icon search__click"> <i class="material-symbols-outlined">search</i> </a>
                                        <div class="search__wrapper">
                                            <form class="search__wrapper__form" action="#">
                                                <div class="search__wrapper__close"> <i class="fa-solid fa-times"></i> </div>
                                                <input class="search__wrapper__input" type="text" placeholder="Search Here.....">
                                                <button type="submit"><i class="material-symbols-outlined">search</i></button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="dashboard__header__right__item">
                                        <a href="javascript:void(0)" class="dashboard__header__notification__icon lightMode" id="mode_change"> <i class="material-symbols-outlined">wb_sunny</i> </a>
                                    </div>
                                    <div class="dashboard__header__right__item">
                                        <div class="dashboard__header__notification">
                                            <a href="javascript:void(0)" class="dashboard__header__notification__icon"> <i class="material-symbols-outlined">notifications</i> </a>
                                            <span class="dashboard__header__notification__number">9</span>
                                            <div class="dashboard__header__notification__wrap">
                                                <h6 class="dashboard__header__notification__wrap__title"> Notifications </h6>
                                                <ul class="dashboard__header__notification__wrap__list">
                                                    <li class="dashboard__header__notification__wrap__list__item">
                                                        <div class="dashboard__header__notification__wrap__list__flex">
                                                            <div class="dashboard__header__notification__wrap__list__icon">
                                                                <i class="las la-bell"></i>
                                                            </div>
                                                            <div class="dashboard__header__notification__wrap__list__contents">
                                                                <a class="dashboard__header__notification__wrap__list__contents__title" href="javascript:void(0)"> Notification One </a>
                                                                <span class="dashboard__header__notification__wrap__list__contents__sub"> 4 hours ago </span>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="dashboard__header__notification__wrap__list__item">
                                                        <div class="dashboard__header__notification__wrap__list__flex">
                                                            <div class="dashboard__header__notification__wrap__list__icon">
                                                                <i class="las la-bell"></i>
                                                            </div>
                                                            <div class="dashboard__header__notification__wrap__list__contents">
                                                                <a class="dashboard__header__notification__wrap__list__contents__title" href="javascript:void(0)"> Notification Two </a>
                                                                <span class="dashboard__header__notification__wrap__list__contents__sub"> 8 hours ago </span>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="dashboard__header__notification__wrap__list__item">
                                                        <div class="dashboard__header__notification__wrap__list__flex">
                                                            <div class="dashboard__header__notification__wrap__list__icon">
                                                                <i class="las la-bell"></i>
                                                            </div>
                                                            <div class="dashboard__header__notification__wrap__list__contents">
                                                                <a class="dashboard__header__notification__wrap__list__contents__title" href="javascript:void(0)"> Notification Three </a>
                                                                <span class="dashboard__header__notification__wrap__list__contents__sub"> 1 day ago </span>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="dashboard__header__notification__wrap__list__item">
                                                        <div class="dashboard__header__notification__wrap__list__flex">
                                                            <div class="dashboard__header__notification__wrap__list__icon">
                                                                <i class="las la-bell"></i>
                                                            </div>
                                                            <div class="dashboard__header__notification__wrap__list__contents">
                                                                <a class="dashboard__header__notification__wrap__list__contents__title" href="javascript:void(0)"> Notification Four </a>
                                                                <span class="dashboard__header__notification__wrap__list__contents__sub"> 3 day ago </span>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="dashboard__header__notification__wrap__list__item">
                                                        <div class="dashboard__header__notification__wrap__list__flex">
                                                            <div class="dashboard__header__notification__wrap__list__icon">
                                                                <i class="las la-bell"></i>
                                                            </div>
                                                            <div class="dashboard__header__notification__wrap__list__contents">
                                                                <a class="dashboard__header__notification__wrap__list__contents__title" href="javascript:void(0)"> Notification Five </a>
                                                                <span class="dashboard__header__notification__wrap__list__contents__sub"> 7 day ago </span>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                                <a href="javascript:void(0)" class="dashboard__header__notification__wrap__btn"> See All Notification </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="dashboard__header__right__item">
                                        <div class="dashboard__header__author">
                                            <a href="javascript:void(0)" class="dashboard__header__author__flex flex-btn">
                                                <div class="dashboard__header__author__thumb">
                                                    <img src="{{asset('html/assets/img/author_nav_new.jpg')}}" alt="authorImg">
                                                </div>
                                            </a>
                                            <div class="dashboard__header__author__wrapper">
                                                <div class="dashboard__header__author__wrapper__list">
                                                    <a href="{{url('/userProfile')}}" class="dashboard__header__author__wrapper__list__item">Profile</a>
                                                 
                                                    <!-- <a href="{{ url('/api/logout') }}" class="dashboard__header__author__wrapper__list__item">Log Out</a> -->
                                                    <a href="#" onclick="logout()" class="dashboard__header__author__wrapper__list__item">Log Out</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div>

                    @yield('content')

                </div>

            </div>
        </div>
    </div>


    <div class="body-overlay"></div>

    <!-- Dashboard end -->



    <!-- jquery -->
    <!-- <script src="{{asset('html/assets/js/jquery-3.6.0.min.js')}}"></script> -->
    <!-- jquery Migrate -->
    <!-- <script src="{{asset('html/assets/js/jquery-migrate.min.js')}}"></script> -->
    <!-- bootstrap -->
    <script src="{{asset('html/assets/js/bootstrap.bundle.min.js')}}"></script>
    <!-- Slick Slider -->
    <script src="{{asset('html/assets/js/slick.js')}}"></script>
    <!-- Plugins Js -->
    <script src="{{asset('html/assets/js/plugin.js')}}"></script>
    <!-- Fancy box Js -->
    <script src="{{asset('html/assets/js/fancybox.umd.js')}}"></script>
    <!-- Map Js -->
    <script src="{{asset('html/assets/js/map/raphael.min.js')}}"></script>
    <script src="{{asset('html/assets/js/map/jquery.mapael.js')}}"></script>
    <script src="{{asset('html/assets/js/map/world_countries.js')}}"></script>

    <!-- main js -->
    <script src="html/assets/js/main.js"></script>

    <script>
  



    // logout
    async function logout(){
        try{

            let res=await axios.get("/api/logout",HeaderToken());

            localStorage.clear();

            sessionStorage.clear();

            window.location.href="/userLogin";
        }catch (e) {
            errorToast(res.data['message']);
        }
    }
</script>



</body>

</html>