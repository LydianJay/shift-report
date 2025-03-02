<!--
    =========================================================
    * Corporate UI - v1.0.0
    =========================================================
    
    * Product Page: https://www.creative-tim.com/product/corporate-ui
    * Copyright 2022 Creative Tim (https://www.creative-tim.com)
    * Licensed under MIT (https://www.creative-tim.com/license)
    * Coded by Creative Tim
    
    =========================================================
    
    * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
    -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('vendor/creative-tim/img/apple-icon.png') }}">
        <link rel="icon" type="image/png" href="{{ asset('vendor/creative-tim/img/favicon.png') }}">
        <title>
            {{ config('constants.title') }}
        </title>
        <!--     Fonts and icons     -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Noto+Sans:300,400,500,600,700,800|PT+Mono:300,400,500,600,700" rel="stylesheet" />
        <!-- Nucleo Icons -->
        <link href="{{ asset('vendor/creative-tim/css/nucleo-icons.css') }}" rel="stylesheet" />
        <link href="{{ asset('vendor/creative-tim/css/nucleo-svg.css') }}" rel="stylesheet" />
        <!-- Font Awesome Icons -->
        <script src="https://kit.fontawesome.com/349ee9c857.js" crossorigin="anonymous"></script>
        <link href="{{ 'vendor/creative-tim/css/nucleo-svg.css' }}" rel="stylesheet" />
        <!-- CSS Files -->
        <link id="pagestyle" href="{{ asset('vendor/creative-tim/css/corporate-ui-dashboard.css?v=1.0.0') }}" rel="stylesheet" />

        <!-- Icons -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <!--   Core JS Files   -->
        <script src="{{ asset('vendor/creative-tim/js/core/popper.min.js') }}"></script>
        <script src="{{ asset('vendor/creative-tim/js/core/bootstrap.min.js') }}"></script>
        <script src="{{ asset('vendor/creative-tim/js/plugins/perfect-scrollbar.min.js') }}"></script>
        <script src="{{ asset('vendor/creative-tim/js/plugins/smooth-scrollbar.min.js') }}"></script>
        <script src="{{ asset('vendor/creative-tim/js/plugins/chartjs.min.js') }}"></script>
        <script src="{{ asset('vendor/creative-tim/js/plugins/swiper-bundle.min.js') }}" type="text/javascript"></script>
        <!-- Control Center for Corporate UI Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="{{ asset('vendor/creative-tim/js/corporate-ui-dashboard.min.js?v=1.0.0') }}"></script>
    </head>
    <body class="g-sidenav-show  bg-gray-100">
        <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 bg-slate-900 fixed-start " id="sidenav-main">
            <div class="sidenav-header">
                <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
                <a class="navbar-brand d-flex align-items-center m-0" href=" https://demos.creative-tim.com/corporate-ui-dashboard/pages/dashboard.html " target="_blank">
                <span class="font-weight-bold text-lg">Corporate UI</span>
                </a>
            </div>
            <div class="collapse navbar-collapse px-4  w-auto " id="sidenav-collapse-main">
                <ul class="navbar-nav">
                    @foreach( config('routes') as $d)

                        <li class="nav-item my-1">
                            <a class="nav-link  active" href="../pages/dashboard.html">
                                <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                                    <i class="{{$d['icon']}} fs-5 opacity-10 text-dark"></i>
                                </div>
                                <span class="nav-link-text ms-1">{{$d['title']}}</span>
                            </a>
                        </li>
                    
                    @endforeach
                </ul>
                
            </div>
        </aside>
        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            <!-- Navbar -->
            <nav class="navbar navbar-main navbar-expand-lg mx-5 px-0 shadow-none rounded mb-3" id="navbarBlur" navbar-scroll="true">
                <div class="container-fluid py-1 px-2">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-transparent mb-1 pb-0 pt-1 px-0 me-sm-6 me-5">
                            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
                        </ol>
                        <h6 class="font-weight-bold mb-0">Dashboard</h6>
                    </nav>
                    <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    </div>
                </div>
            </nav>

             {{ $slot }}
            <!-- End Navbar -->
            <div class="container-fluid py-4 px-5">
                <footer class="footer pt-3  ">
                    <div class="container-fluid">
                        <div class="row align-items-center justify-content-lg-between">
                            <div class="col-lg-6 mb-lg-0 mb-4">
                                <div class="copyright text-center text-xs text-muted text-lg-start">
                                    Copyright
                                    © <script>
                                        document.write(new Date().getFullYear())
                                    </script>
                                    
                                    <a href="https://github.com/LydianJay" class="text-secondary" target="_blank"> <span class="text-bold text-dark"> {{ config('constants.site-owner') }} </span> </a>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </footer>
            </div>
        </main>
    </body>
</html>