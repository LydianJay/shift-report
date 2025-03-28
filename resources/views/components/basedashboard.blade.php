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

@props(['active_link'])

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="user_id" content="{{ Auth::id() }}">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/icon.png') }}">
        <link rel="icon" type="image/png" href="{{ asset('assets/img/icon.png') }}">
        <title>
            {{ config('constants.title') }}
        </title>
        <!--     Fonts and icons     -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Noto+Sans:300,400,500,600,700,800|PT+Mono:300,400,500,600,700" rel="stylesheet" />
        <!-- Nucleo Icons -->
        <link href="{{ asset('vendor/creative-tim/css/nucleo-icons.css') }}" rel="stylesheet" />
        <link href="{{ asset('vendor/creative-tim/css/nucleo-svg.css') }}" rel="stylesheet" />

        <link href="{{ 'vendor/creative-tim/css/nucleo-svg.css' }}" rel="stylesheet" />
        <!-- CSS Files -->
        <link id="pagestyle" href="{{ asset('vendor/creative-tim/css/corporate-ui-dashboard.css?v=1.0.0') }}" rel="stylesheet" />

        {{-- md5 --}}
        <script src="https://cdn.jsdelivr.net/npm/spark-md5@3.0.2/spark-md5.min.js"></script>

        {{-- sheetjs --}}
        <script lang="javascript" src="https://cdn.sheetjs.com/xlsx-0.20.3/package/dist/xlsx.full.min.js"></script>

        <!-- Icons -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <!--   Core JS Files   -->
        <script src="{{ asset('vendor/creative-tim/js/core/popper.min.js') }}"></script>
        <script src="{{ asset('vendor/creative-tim/js/core/bootstrap.min.js') }}"></script>
        <script src="{{ asset('vendor/creative-tim/js/plugins/perfect-scrollbar.min.js') }}"></script>
        <script src="{{ asset('vendor/creative-tim/js/plugins/smooth-scrollbar.min.js') }}"></script>
        <script src="{{ asset('vendor/creative-tim/js/plugins/chartjs.min.js') }}"></script>
        <script src="{{ asset('vendor/creative-tim/js/plugins/swiper-bundle.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('vendor/creative-tim/js/corporate-ui-dashboard.min.js?v=1.0.0') }}"></script>
        <style>

            :root {
                --bs-blue: #63B3ED;
                --bs-indigo: #596CFF;
                --bs-purple: #6f42c1;
                --bs-pink: #d63384;
                --bs-red: #F56565;
                --bs-orange: #fd7e14;
                --bs-yellow: #FBD38D;
                --bs-green: #81E6D9;
                --bs-teal: #20c997;
                --bs-cyan: #0dcaf0;
                --bs-white: #fff;
                --bs-gray: #6c757d;
                --bs-gray-dark: #343a40;
                --bs-gray-100: #f9fafb;
                --bs-gray-200: #e9ecef;
                --bs-gray-300: #dde0e5;
                --bs-gray-400: #ced4da;
                --bs-gray-500: #adb5bd;
                --bs-gray-600: #6c757d;
                --bs-gray-700: #495057;
                --bs-gray-800: #343a40;
                --bs-gray-900: #212529;
                --bs-primary: #774dd3;
                --bs-secondary: #64748b;
                --bs-success: #67c23a;
                --bs-info: #55a6f8;
                --bs-warning: #f19937;
                --bs-danger: #ea4e3d;
                --bs-light: #cbd5e1;
                --bs-dark: #1e293b;
                --bs-white: #fff;
                --bs-primary-rgb: 119, 77, 211;
                --bs-secondary-rgb: 100, 116, 139;
                --bs-success-rgb: 103, 194, 58;
                --bs-info-rgb: 85, 166, 248;
                --bs-warning-rgb: 241, 153, 55;
                --bs-danger-rgb: 234, 78, 61;
                --bs-light-rgb: 203, 213, 225;
                --bs-dark-rgb: 30, 41, 59;
                --bs-white-rgb: 255, 255, 255;
                --bs-white-rgb: 255, 255, 255;
                --bs-black-rgb: 0, 0, 0;
                --bs-body-color-rgb: 100, 116, 139;
                --bs-body-bg-rgb: 255, 255, 255;
                --bs-font-sans-serif: "Noto Sans", "Open Sans";
                --bs-font-monospace: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
                --bs-gradient: linear-gradient(180deg, rgba(255, 255, 255, 0.15), rgba(255, 255, 255, 0));
                --bs-body-font-family: var(--bs-font-sans-serif);
                --bs-body-font-size: 1rem;
                --bs-body-font-weight: 400;
                --bs-body-line-height: 1.5;
                --bs-body-color: #64748b;
                
                --bs-body-bg: #12101b;
                --bs-border-width: 1px;
                --bs-border-style: solid;
                --bs-border-color: #dde0e5;
                --bs-border-color-translucent: rgba(0, 0, 0, 0.175);
                --bs-border-radius: 0.375rem;
                --bs-border-radius-sm: 0.25rem;
                --bs-border-radius-lg: 0.75rem;
                --bs-border-radius-xl: 1rem;
                --bs-border-radius-2xl: 1.5rem;
                --bs-border-radius-pill: 50rem;
                --bs-heading-color: #1e293b;
                --bs-link-color: #774dd3;
                --bs-link-hover-color: #522aaa;
                --bs-code-color: #d63384;
                --bs-highlight-bg: #fcf8e3;
            }

            .bg-gray-100 {
                background-color: #0c1f35 !important;
            }
            .body {
                
                background-color: var(--bs-body-bg)
            }


           
            p {
                color: #fff !important;
            }

            .clickable-row {
                cursor: pointer;
                color: #fff;
            }

            .clickable-row:hover {
                background-color: #0053b3;
            }

            .navbar-vertical .navbar-nav>.nav-item .nav-link.active {
                background-color: #1c487a;
            }

        </style>

    </head>
    <body class="g-sidenav-show  bg-gray-100">
        <aside class="sidenav navbar navbar-vertical navbar-expand-xs  bg-slate-900 fixed-start rounded border-end border-1 border-secondary" id="sidenav-main">
            <div class="sidenav-header">
                <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
                <a class="navbar-brand d-flex align-items-center m-0" href="#" target="_blank">
                <span class="font-weight-bold text-lg">{{ config('constants.title') }}</span>
                </a>
            </div>
            <div class="collapse navbar-collapse px-4  w-auto " id="sidenav-collapse-main">
                <ul class="navbar-nav">
                    @foreach( config('routes') as $d)

                        <li class="nav-item my-1 border border-radius-md">
                            <a class="nav-link {{ strcmp($active_link, $d['name']) == 0 ? 'active' : '' }}" href="{{ route($d['route']) }}">
                                <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                                    <i class="{{$d['icon']}} fs-5 opacity-10 text-dark"></i>
                                </div>
                                <span class="nav-link-text text-wrap">{{$d['title']}}</span>
                            </a>
                        </li>
                    
                    @endforeach
                </ul>
                
            </div>
        </aside>
        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg text-white">
            <!-- Navbar -->
            <nav class="navbar navbar-main navbar-expand-lg px-3 shadow-none border-bottom mb-3" id="navbarBlur" navbar-scroll="true">
                <div class="container-fluid py-1 px-2">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-transparent mb-1 pb-0 pt-1 px-0 me-sm-6 me-5">
                            <li class="breadcrumb-item text-sm "><a class="opacity-5 text-white " href="javascript:;">Pages</a></li>
                            <li class="breadcrumb-item text-sm text-white active" aria-current="page">{{ config('routes')[$active_link]['title'] }}</li>
                        </ol>
                        <h6 class="font-weight-bold mb-0 text-white">{{ config('routes')[$active_link]['title'] }}</h6>
                    </nav>
                    <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                        <div class="ms-md-auto d-flex align-items-center">
                            <ul class="navbar-nav justify-content-end">
                                <li class="nav-item d-flex align-items-center">
                                    <a href="{{ route('logout') }}" class="nav-link text-white font-weight-bold px-0">
                                        <i class="bi bi-gear opacity-7 fs-7 text-white me-2"></i>
                                        <span class="fs-7">Logout</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
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
                                <div class="copyright text-white text-center text-xs text-muted text-lg-start">
                                    Copyright
                                    © <script>
                                        document.write(new Date().getFullYear())
                                    </script>
                                    
                                    <a href="https://github.com/LydianJay" class="text-secondary" target="_blank"> <span class="text-bold text-white"> {{ config('constants.site-owner') }} </span> </a>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </footer>
            </div>
        </main>
    </body>
</html>