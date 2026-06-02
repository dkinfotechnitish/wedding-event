<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, viewport-fit=cover, shrink-to-fit=no">
    <meta name="description" content="Suha - Multipurpose E-commerce Mobile HTML Template">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#625AFA">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <title>Suha - Multipurpose E-commerce Mobile HTML Template</title>
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Google+Sans:ital,opsz,wght@0,17..18,400..700;1,17..18,400..700&amp;display=swap"
        rel="stylesheet">

    <link rel="icon" href="assets/img/icons/icon-72x72.png">

    <link rel="apple-touch-icon" href="assets/img/icons/icon-96x96.png">
    <link rel="apple-touch-icon" sizes="152x152" href="assets/img/icons/icon-152x152.png">
    <link rel="apple-touch-icon" sizes="167x167" href="assets/img/icons/icon-167x167.png">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/icons/icon-180x180.png">

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/tabler-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">

    <link rel="manifest" href="{{ asset('assets/manifest.json') }}">
</head>

<body>
    <!-- Preloader-->
    {{-- <div class="preloader" id="preloader">
        <div class="spinner-grow text-secondary" role="status">
            <div class="sr-only"></div>
        </div>
    </div> --}}

    <!-- Header Area -->
    <div class="header-area" id="headerArea">
        <div class="container h-100 d-flex align-items-center justify-content-between gap-2 d-flex">
            <!-- Logo Wrapper-->
            <div class="logo-wrapper"><a href="{{ route('index') }}" class="text-dark"><img src="assets/img/logo.png"
                        width="35%" alt=""></a>
            </div>
            <div class="navbar-logo-container d-flex align-items-center gap-2">
                <!-- Cart Icon -->
                {{-- <div class="cart-icon-wrap"><a href="#"><i class="ti ti-basket-bolt"></i><span>0</span></a>
                </div>
                <!-- User Profile Icon -->
                <div class="user-profile-icon"><a href="profile.html"><img src="assets/img/bg-img/9.jpg"
                            alt=""></a></div> --}}
                <!-- Navbar Toggler -->
                <div class="form-check form-switch mb-0">
                    <input class="form-check-input border-warning " id="darkSwitch" type="checkbox" role="switch">
                </div>
                <div class="suha-navbar-toggler" data-bs-toggle="offcanvas" data-bs-target="#suhaOffcanvas"
                    aria-controls="suhaOffcanvas">
                    <div><span></span><span></span><span></span></div>
                </div>
            </div>
        </div>
    </div>

    <div class="offcanvas offcanvas-start suha-offcanvas-wrap" tabindex="-1" id="suhaOffcanvas"
        aria-labelledby="suhaOffcanvasLabel">
        <!-- Close button-->
        <button class="btn-close btn-close-white" type="button" data-bs-dismiss="offcanvas"
            aria-label="Close"></button>
        <!-- Offcanvas body-->
        <div class="offcanvas-body">
            <!-- Sidenav Profile-->
            <div class="sidenav-profile">
                <div class=""><img src="assets/img/logo1.png" alt=""></div>
                {{-- <div class="user-info">
                    <h5 class="user-name mb-1 text-white">Suha Sarah</h5>
                    <p class="available-balance text-white">Balance $<span class="counter">99.29</span></p>
                </div> --}}
            </div>

            @php
                $categories = \App\Models\Category::with([
                    'services' => function ($query) {
                        $query->where('show_on_homepage', 1)->orderBy('position');
                    },
                ])
                    ->orderBy('position')
                    ->get()
                    ->filter(function ($category) {
                        return $category->services->isNotEmpty();
                    });
            @endphp

            <ul class="sidenav-nav ps-0">
                <li>
                    <a href="{{ route('index') }}">
                        <i class="ti ti-home"></i>Home
                    </a>
                </li>

                <li>
                    <a href="{{ route('about') }}">
                        <i class="ti ti-user"></i>About Us
                    </a>
                </li>

                @foreach ($categories as $category)
                    <li class="suha-dropdown-menu">

                        <a href="#">
                            <i class="ti ti-category"></i>
                            {{ $category->name }}
                        </a>

                        <ul>
                            @foreach ($category->services as $service)
                                <li>
                                    <a href="{{ $service->url ?? '#' }}">
                                        {{ $service->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>

                    </li>
                @endforeach

                <li>
                    <a href="{{ route('career') }}">
                        <i class="ti ti-briefcase"></i>Career
                    </a>
                </li>

                <li>
                    <a href="{{ route('terms-conditions') }}">
                        <i class="ti ti-file-text"></i>Terms & Conditions
                    </a>
                </li>

                <li>
                    <a href="{{ route('privacy-policy') }}">
                        <i class="ti ti-lock"></i>Privacy Policy
                    </a>
                </li>

                <li>
                    <a href="{{ route('faq') }}">
                        <i class="ti ti-help"></i>FAQ's
                    </a>
                </li>

                <li>
                    <a href="{{ route('contact') }}">
                        <i class="ti ti-phone"></i>Contact Us
                    </a>
                </li>
            </ul>
        </div>
    </div>

    @yield('content')

    <div class="internet-connection-status" id="internetStatus"></div>

    <div class="footer-nav-area" id="footerNav">
        <div class="suha-footer-nav">
            <ul class="h-100 d-flex align-items-center justify-content-between ps-0">
                <li><a href="{{ route('index') }}"><i class="ti ti-home"></i>HOME</a></li>
                <li><a href="{{ route('about') }}"><i class="ti ti-user"></i>ABOUT</a></li>
                <li><a href="{{ route('career') }}"><i class="ti ti-briefcase"></i>CAREER</a></li>
                <li><a href="{{ route('faq') }}"><i class="ti ti-help"></i>FAQ's</a></li>
                <li><a href="{{ route('contact') }}"><i class="ti ti-phone"></i>CONTACT</a></li>
            </ul>
        </div>
    </div>

    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.passwordstrength.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/js/theme-switching.js') }}"></script>
    <script src="{{ asset('assets/js/no-internet.js') }}"></script>
    <script src="{{ asset('assets/js/active.js') }}"></script>
    <script src="{{ asset('assets/js/pwa.js') }}"></script>
</body>

</html>
