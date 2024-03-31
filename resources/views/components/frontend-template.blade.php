<!DOCTYPE html>
<html lang="en">


<!-- index.html  21 Nov 2019 03:44:50 GMT -->

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Internship</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="/assets/css/app.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Template CSS -->
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/bundles/summernote/summernote-bs4.css">
    <link rel="stylesheet" href="/assets/css/components.css">
    <link rel="stylesheet" href="/assets/bundles/datatables/datatables.min.css">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="/assets/css/custom.css">
    <link rel='shortcut icon' type='image/x-icon' href='/assets/img/favicon.ico' />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
</head>

<body>
    @include('sweetalert::alert')
    <div class="loader"></div>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar sticky">
                <div class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg collapse-btn"> <i
                                    data-feather="align-justify"></i></a>
                        </li>
                        <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                                <i data-feather="maximize"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown"><a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image"
                                src="{{ asset('storage/' . Auth::user()->profile_photo_path) }}"
                                class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>
                        <div class="dropdown-menu dropdown-menu-right pullDown">
                            <div class="dropdown-title">{{ Auth::user()->name }}</div>
                            <a href="{{ route('profile.show') }}" class="dropdown-item has-icon"> <i
                                    class="far fa-user"></i> Profile
                            </a>
                            <a href="#" class="dropdown-item has-icon"> <i class="fas fa-bolt"></i>
                                Activities
                            </a> <a href="#" class="dropdown-item has-icon"> <i class="fas fa-cog"></i>
                                Settings
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i> {{ __('Log Out') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </nav>
            <!-- Sidebar start --------------------------------->
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="/dashboard"> <img alt="image" src="/assets/img/logo.png" class="header-logo" />
                            <span class="logo-name">Inventory</span>
                        </a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                    class="material-icons">store_mall_directory</i><span>Category</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="{{ route('Inventory.index') }}">Add Category</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="sidebar-menu">
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                    class="material-icons">local_mall</i><span>Product</span></a>
                            <ul class="dropdown-menu">
                                {{-- <li><a class="nav-link" href="{{ route('Product.create') }}">Add Product</a></li> --}}
                                <li><a class="nav-link" href="{{ route('Product.index') }}">Add Product</a></li>
                            </ul>
                        </li>
                    </ul>
                </aside>
            </div>
            <!--Sidebar End -------------------------------------->

            <!-- Main Content -->
            <div class="main-content">
                {{ $slot }}
            </div>
            <x-color-change-setting /> <!-- dashboard color change code is extended Here from Components folder -->
            <footer class="main-footer">
                <div class="footer-left">
                    <a href="/">Internship</a></a>
                </div>
                <div class="footer-right">
                </div>
            </footer>
        </div>
    </div>
    <!-- General JS Scripts -->
    <script src="/assets/js/app.min.js"></script>
    <script src="/assets/bundles/summernote/summernote-bs4.js"></script>
    <script src="/assets/js/scripts.js"></script>
    <script src="/assets/bundles/datatables/datatables.min.js"></script>
    <!-- JS Libraies -->
    <script src="/assets/bundles/apexcharts/apexcharts.min.js"></script>
    <!-- Page Specific JS File -->
    <script src="/assets/js/page/index.js"></script>
    <!-- Template JS File -->
    <script src="/assets/js/page/datatables.js"></script>
    <!-- Custom JS File -->
    <script src="/assets/js/custom.js"></script>
    <!-- Chartjs -->
    <script src="path/to/chartjs/dist/chart.umd.js"></script>
    <script>
        const myChart = new Chart(ctx, {
            ...
        });
    </script>
</body>

<!-- index.html  21 Nov 2019 03:47:04 GMT -->

</html>
