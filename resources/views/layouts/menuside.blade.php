<html lang="en">
<head>
    <meta charset="utf-8">
    <title>
        Panet Academy
    </title>
    <meta name="description" content="Samples">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
    <!-- Call App Mode on ios devices -->
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <!-- Remove Tap Highlight on Windows Phone IE -->
    <meta name="msapplication-tap-highlight" content="no">
    <!-- base css -->
    <link rel="stylesheet" media="screen, print" href="{{asset('css/vendors.bundle.css')}}">
    <link rel="stylesheet" media="screen, print" href="{{asset('css/app.bundle.css')}}">
    <!-- Place favicon.ico in the root directory -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('img/favicon/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('img/favicon/favicon-32x32.png')}}">
    <link rel="mask-icon" href="{{asset('img/favicon/safari-pinned-tab.svg')}}" color="#5bbad5">

    <link href="{{asset('fontawesome-free-5.14.0-web/css/all.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/meyer-reset/reset.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <script src="{{asset('js/3.5.1/jquery.min.js')}}"></script>


</head>
<style>

    .submit_go_btn{
        width: 100px;
        height: 40px;
        background: #ffffff;
        border: 1px solid #01376e;
        border-radius: 100px;
        color:#01376e;
    }
    .main_color_background{
        background:#f8f9fb !important
    }
    .main_color_text{
        color:#f8f9fb !important
    }
    .sub_color_background{
        background:#01376e !important
    }
    .sub_color_text{
        color:#01376e !important
    }
    .header-btn[data-class='mobile-nav-on']{
        border-color: #01376e;
        background-color: #01376e !important;
        padding-top: 6px;

    }
    .submit_filter_form{
        background: #ffffff;
        border-radius: 13px;
        width: 80px;
        border: 1px solid #01376e;
        height: 30px;
    }
    .submit_container{
        width: 100%;
        text-align: center;
        float: left;
        padding-top: 20px;
    }

    .lecturer_info_name{
        width: 100%;
        float: left;
        margin-top: 7px;
        font-size: 14px;
        color: #01376e;
    }
    .lecturer_info_details{
        width: 100%;
        float: left;
        margin-top: 3px;
        font-size: 12px;
        color: #707477;
    }
    /* width */
    ::-webkit-scrollbar {
        width: 5px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
        background: #888;
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
        background: #555;
    }

</style>
<body class="mod-bg-1 ">
<div class="page-wrapper">
    <div class="page-inner">
        <!-- BEGIN Left Aside -->
        <aside class="page-sidebar main_color_background" >
            <div class="page-logo sub_color_background" >
                <a href="#" class="page-logo-link press-scale-down d-flex align-items-center position-relative" data-toggle="modal" data-target="#modal-shortcut">
                    <span class="page-logo-text mr-1">Panit Academy</span>
                    <span class="position-absolute text-white opacity-50 small pos-top pos-right mr-2 mt-n2"></span>
                </a>
            </div>
            <!-- BEGIN PRIMARY NAVIGATION -->
            <nav id="js-primary-nav" class="primary-nav" role="navigation">

                <ul id="js-nav-menu" class="nav-menu">
                    <li>
                        <div style="padding: 10px 20px">
                            <img src="{{asset('img/logo.jpeg')}}" style="width: 90%">
                        </div>
                    </li>
                    <li>
                        <a href="{{asset('home')}}" title="Application Intel" data-filter-tags="application intel">
                            <i class="ni ni-home"></i>
                            <span class="nav-link-text" data-i18n="nav.application_intel">Home</span>
                        </a>
                    </li>
                    @auth
                    <li>
                        <a href="{{asset('userCourses')}}" title="Theme Settings" data-filter-tags="theme settings">
                            <i class="fal fa-th"></i>
                            <span class="nav-link-text" data-i18n="nav.theme_settings">Courses</span>
                        </a>
                    </li>
                    @endauth
                    <li>
                        <a href="{{asset('joinUs')}}" title="Package Info" data-filter-tags="package info">
                            <i class="fal fa-plus-square"></i>
                            <span class="nav-link-text" data-i18n="nav.package_info">Join us</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" title="Package Info" data-filter-tags="package info">
                            <i class="fal fa-file-alt"></i>
                            <span class="nav-link-text" data-i18n="nav.package_info">Terms & Conditions</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{asset('aboutUs')}}" title="Package Info" data-filter-tags="package info">
                            <i class="fal fa-users"></i>
                            <span class="nav-link-text" data-i18n="nav.package_info">About Us</span>
                        </a>
                    </li>
                    @auth
                    <li>
                        <a href="{{asset('profile')}}" title="Package Info" data-filter-tags="package info">
                            <i class="fal fa-user"></i>
                            <span class="nav-link-text" data-i18n="nav.package_info">Profile</span>
                        </a>
                    </li>
                    @endauth
                    <li>
                        <a href="{{asset('contact')}}" title="Package Info" data-filter-tags="package info">
                            <i class="fal fa-pencil"></i>
                            <span class="nav-link-text" data-i18n="nav.package_info">Contact us</span>
                        </a>
                    </li>
                </ul>
                <div class="filter-message js-filter-message bg-success-600"></div>
            </nav>
        </aside>
        <!-- END Left Aside -->
        <div class="page-content-wrapper">
            <!-- BEGIN Page Header -->
            <header class="page-header" role="banner">
                <!-- we need this logo when user switches to nav-function-top -->
                <div class="page-logo">
                    <a href="#" class="page-logo-link press-scale-down d-flex align-items-center position-relative" data-toggle="modal" data-target="#modal-shortcut">
                        <img src="{{asset('img/logo.png')}}" alt="SmartAdmin WebApp" aria-roledescription="logo">
                        <span class="page-logo-text mr-1">SmartAdmin WebApp</span>
                        <span class="position-absolute text-white opacity-50 small pos-top pos-right mr-2 mt-n2"></span>
                        <i class="fal fa-angle-down d-inline-block ml-1 fs-lg color-primary-300"></i>
                    </a>
                </div>

                <div class="hidden-lg-up">
                    <a href="#" class="header-btn btn press-scale-down" data-action="toggle" data-class="mobile-nav-on">
                        <i class="ni ni-menu"></i>
                    </a>
                </div>

                <div class="ml-auto d-flex">
                    <!-- app user menu -->
                    <div>
                        <!-- Modal -->
                        @auth
                        <a href="#" data-toggle="dropdown" title="drlantern@gotbootstrap.com" class="header-icon d-flex align-items-center justify-content-center ml-2">
                            <img src="{{asset('img/demo/avatars/avatar-admin.png')}}" class="profile-image rounded-circle" alt="Dr. Codex Lantern">
                            <!-- you can also add username next to the avatar with the codes below:
                            <span class="ml-1 mr-1 text-truncate text-truncate-header hidden-xs-down">Me</span>
                            <i class="ni ni-chevron-down hidden-xs-down"></i> -->
                        </a>
                        <div class="dropdown-menu dropdown-menu-animated dropdown-lg">
                            <div class="dropdown-header bg-trans-gradient d-flex flex-row py-4 rounded-top">
                                <div class="d-flex flex-row align-items-center mt-1 mb-1 color-white">
                                            <span class="mr-2">
                                                <img src="{{asset('img/demo/avatars/avatar-admin.png')}}" class="rounded-circle profile-image" alt="Dr. Codex Lantern">
                                            </span>
                                    <div class="info-card-text">
                                        <div class="fs-lg text-truncate text-truncate-lg">Dr. Codex Lantern</div>
                                        <span class="text-truncate text-truncate-md opacity-80">drlantern@gotbootstrap.com</span>
                                    </div>
                                </div>
                            </div>

                            <div class="dropdown-divider m-0"></div>
                            <a class="dropdown-item fw-500 pt-3 pb-3" href="page_login-alt.html">
                                <span data-i18n="drpdwn.page-logout">Logout</span>
                                <span class="float-right fw-n">&commat;codexlantern</span>
                            </a>
                        </div>
                        @else
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style="float: right;background: none;border: none;box-shadow: none;color: #7d7878;">
                                login
                            </button>
                        @endauth
                    </div>
                </div>
            </header>
            <!-- END Page Header -->
            <!-- BEGIN Page Content -->
            <!-- the #js-page-content id is needed for some plugins to initialize -->
            <main id="js-page-content" role="main" class="page-content" style="padding: 0px">
                <div class="container-fluid">
                    <div class="row">
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content" style="border-radius: 25px;margin-top: 120px">
                                    <div class="modal-header" style="padding: 0px">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-right: 20px;margin-top: 8px;padding: 0px;font-size: 30px;color: #084282;padding-bottom: 10px">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <form action="{{asset('login')}}" method="POST" style="width: 100%" >
                                                @csrf
                                            <div class="col-md-12" style="padding-top:10px;text-align: justify ">
                                                <fieldset class="formRow">
                                                    <div class="formRow--item">
                                                        <label for="user_name" class="formRow--input-wrapper js-inputWrapper">
                                                            <input type="text" class="formRow--input js-input" name="user_name" id="user_name"placeholder="User Name" required>
                                                        </label>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class="col-md-12" style="padding-top:10px;text-align: justify ">
                                                <fieldset class="formRow">
                                                    <div class="formRow--item">
                                                        <label for="password" class="formRow--input-wrapper js-inputWrapper">
                                                            <input type="password" class="formRow--input js-input" name="password" id="password" placeholder="Password" required>
                                                        </label>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class="submit_container">
                                                <input type="submit" class="submit_filter_form" value="GO">
                                            </div>
                                            </form>
                                            <div class="col-md-12" style="padding-top:10px;text-align: justify ">
                                                <a href="#" style="color: #022c58" >Forgot Password ?</a>
                                            </div>
                                            <div class="col-md-12" style="padding-top:10px;text-align: justify ">
                                                Don't have account ?<a href="#"  style="color: #022c58"> Join us</a>
                                            </div>
                                            <div style="height: 20px;width: 100%;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @yield('content')
                    </div>
                </div>
            </main>

            <!-- this overlay is activated only when mobile menu is triggered -->
            <div class="page-content-overlay" data-action="toggle" data-class="mobile-nav-on"></div> <!-- END Page Content -->

        </div>
    </div>
</div>

<script src="{{asset('js/vendors.bundle.js')}}"></script>
<script src="{{asset('js/app.bundle.js')}}"></script>
<script  src="{{asset('js/script.js')}}"></script>
</body>
</html>
