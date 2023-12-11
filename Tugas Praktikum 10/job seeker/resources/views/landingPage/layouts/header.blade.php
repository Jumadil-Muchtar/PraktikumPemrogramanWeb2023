<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
         <title>Job Seeker</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="manifest" href="site.webmanifest">
		<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

		<!-- CSS here -->
            <link rel="stylesheet" href="{{asset('landingPage')}}/assets/css/bootstrap.min.css">
            <link rel="stylesheet" href="{{asset('landingPage')}}/assets/css/owl.carousel.min.css">
            <link rel="stylesheet" href="{{asset('landingPage')}}/assets/css/flaticon.css">
            <link rel="stylesheet" href="{{asset('landingPage')}}/assets/css/price_rangs.css">
            <link rel="stylesheet" href="{{asset('landingPage')}}/assets/css/slicknav.css">
            <link rel="stylesheet" href="{{asset('landingPage')}}/assets/css/animate.min.css">
            <link rel="stylesheet" href="{{asset('landingPage')}}/assets/css/magnific-popup.css">
            <link rel="stylesheet" href="{{asset('landingPage')}}/assets/css/fontawesome-all.min.css">
            <link rel="stylesheet" href="{{asset('landingPage')}}/assets/css/themify-icons.css">
            <link rel="stylesheet" href="{{asset('landingPage')}}/assets/css/slick.css">
            <link rel="stylesheet" href="{{asset('landingPage')}}/assets/css/nice-select.css">
            <link rel="stylesheet" href="{{asset('landingPage')}}/assets/css/style.css">


            <!-- Bootstrap JS and dependencies -->
            <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

   </head>

   <body>
    <div class="container">
        @yield('content')
    </div>


    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="{{asset('landingPage')}}/assets/img/logo/logo.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
    <header>
        <!-- Header Start -->
       <div class="header-area header-transparrent">
           <div class="headder-top header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-2">
                            <!-- Logo -->
                            <div class="logo">
                                <a href="/"><img src="{{asset('landingPage')}}/assets/img/logo/logo.png" alt=""></a>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9">
                            <div class="menu-wrapper">
                                <!-- Main-menu -->
                                <div class="main-menu">
                                    <nav class="d-none d-lg-block">
                                        <ul id="navigation">
                                            <li><a href="/">Home</a></li>
                                            <li><a href="/job">Find a Jobs </a></li>
                                            <li><a href="/profil/{id}">Profile</a></li>
                                        </ul>
                                    </nav>
                                </div>
                                <!-- Header-btn -->
                                <div class="header-btn d-none f-right d-lg-block">
                                    @guest('user')
                                        <!-- Tampilkan tombol Register dan Login jika belum login -->
                                        <a href="/login" class="btn head-btn1" style="border-radius: 20px;">Login</a>
                                        <a href="#" class="btn head-btn1" style="border-radius: 20px;">Register</a>
                                    @endguest

                                    @auth('user')
                                        <div class="main-menu">
                                            <nav class="d-none d-lg-block">
                                                <ul id="navigation">
                                                    <li><a href="#" style='color:palevioletred;'>Selamat datang, {{ Auth::guard('user')->user()->name }}</a>
                                                        <ul class="submenu">
                                                            <li><a href="/LogoutUser">Logout</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </nav>
                                        </div>
                                    @endauth
                                </div>
                            </div>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
           </div>
       </div>
        <!-- Header End -->
    </header>
    <main>
