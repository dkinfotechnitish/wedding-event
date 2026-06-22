<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Wedding Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Darkone: An advanced, fully responsive admin dashboard template packed with features to streamline your analytics and management needs.">
    <meta name="author" content="StackBros">
    <meta name="keywords" content="Darkone, admin dashboard, responsive template, analytics, modern UI, management tools">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="robots" content="index, follow">
    <meta name="theme-color" content="#ffffff">

    <link rel="shortcut icon" href="{{ asset('assets/img/logo.png') }}">

    <link href="{{ asset('assets/admin/css/vendor.min.css') }}" rel="stylesheet" type="text/css">

    <link href="{{ asset('assets/admin/css/icons.min.css') }}" rel="stylesheet" type="text/css">

    <link href="{{ asset('assets/admin/css/style.min.css') }}" rel="stylesheet" type="text/css">

    <script src="{{ asset('assets/admin/js/config.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

</head>

<body>

    <div class="app-wrapper">

        <header class="app-topbar">
            <div class="container-fluid">
                <div class="navbar-header">
                    <div class="d-flex align-items-center gap-2">
                        <div class="topbar-item">
                            <button type="button" class="button-toggle-menu topbar-button">
                                <iconify-icon icon="solar:hamburger-menu-outline"
                                    class="fs-24 align-middle"></iconify-icon>
                            </button>
                        </div>
                    </div>

                    <div class="d-flex align-items-center gap-2">
                        <div class="topbar-item">
                            <button type="button" class="topbar-button" id="light-dark-mode">
                                <iconify-icon icon="solar:moon-outline"
                                    class="fs-22 align-middle light-mode"></iconify-icon>
                                <iconify-icon icon="solar:sun-2-outline"
                                    class="fs-22 align-middle dark-mode"></iconify-icon>
                            </button>
                        </div>

                        <div class="dropdown topbar-item">
                            <a type="button" class="topbar-button" id="page-header-user-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="d-flex align-items-center">
                                    <img class="rounded-circle" width="32"
                                        src="{{ asset('assets/admin/images/users/avatar-1.jpg') }}" alt="avatar-3">
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <h6 class="dropdown-header">Welcome!
                                    @auth
                                        <strong class="text-success">{{ auth()->user()->name }}</strong> <br>

                                        <strong class="text-muted mt-2">{{ auth()->user()->email }}</strong>
                                    @endauth

                                </h6>

                                <div class="dropdown-divider my-1"></div>

                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">
                                        <iconify-icon icon="solar:logout-3-outline"
                                            class="align-middle me-2 fs-18"></iconify-icon><span
                                            class="align-middle">Logout</span>
                                    </button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div class="app-sidebar">

            <div class="logo-box">
                <a href="#">
                    <img class="logo-lg" src="{{ asset('assets/img/logo.png') }}" alt=" Logo">
                </a>

            </div>

            <div class="scrollbar" data-simplebar="">

                <ul class="navbar-nav">

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.menu.index') }}">
                            <span class="nav-icon">
                                <i class="fa fa-solid fa-bars" aria-hidden="true"></i>

                            </span>
                            <span class="nav-text"> Menu </span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.banner.index') }}">
                            <span class="nav-icon">
                                <i class="fa fa-solid fa-image" aria-hidden="true"></i>

                            </span>
                            <span class="nav-text"> Banner </span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.category.index') }}">
                            <span class="nav-icon">
                                <i class="fa fa-solid fa-list fa-1x" aria-hidden="true"></i>

                            </span>
                            <span class="nav-text"> Category </span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.service.index') }}">
                            <span class="nav-icon">
                                <i class="fa fa-solid fa-gear fa-1x" aria-hidden="true"></i>
                            </span>
                            <span class="nav-text"> Service </span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.gallery.index') }}">
                            <span class="nav-icon">
                                <i class="fa fa-solid fa-image fa-1x " aria-hidden="true"></i>
                            </span>
                            <span class="nav-text"> Service Galleries </span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.location.index') }}">
                            <span class="nav-icon">
                                <i class="fa fa-solid fa-map fa-1x " aria-hidden="true"></i>
                            </span>
                            <span class="nav-text"> Location </span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span class="nav-icon">
                                <i class="fa fa-solid fa-question fa-1x " aria-hidden="true"></i>
                            </span>
                            <span class="nav-text"> Enquiry </span>
                        </a>
                    </li>

                </ul>
            </div>
        </div>

        <div class="page-content">

            @yield('adminContent')

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 text-center">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> &copy; {{ env('COMPANY_NAME') }}
                            <strong><a href="https://dkinfotechsolutions.com/" id="liveTime">
                                    <span></span> </a></strong>.
                        </div>
                    </div>
                </div>
            </footer>

        </div>

    </div>

    <script>
        function updateTime() {
            const now = new Date();

            const options = {
                day: '2-digit',
                month: '2-digit',
                year: 'numeric',
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit',
                hour12: true,
                timeZone: 'Asia/Kolkata'
            };

            document.querySelector('#liveTime span').innerText =
                now.toLocaleString('en-IN', options);
        }

        updateTime();
        setInterval(updateTime, 1000);
    </script>

    <script src="{{ asset('assets/admin/js/vendor.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/app.js') }}"></script>
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

</body>

</html>
