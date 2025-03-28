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
                
                --bs-body-bg: #2e4768;
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

           
            .body {
                
                background-color: var(--bs-body-bg)
            }


            .card {
                background-color: #063969 !important;
            }

            .card-header {
                background-color: #063969 !important;
                color: #fff !important;
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
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                console.log('DOMContentLoaded');

                let errorModal = new bootstrap.Modal(document.getElementById('errorModal'));
                    errorModal.show();

                console.log('errorModal');

            });
            

        </script>

    </head>
    <body class="">
        <main class="main-content  mt-0">
            <section>
                <div class="page-header min-vh-100">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-4 col-md-6 d-flex flex-column mx-auto">
                                <div class="card mt-8">
                                    <div class="card-header pb-0 text-left bg-transparent">
                                        <h3 class="font-weight-black text-white display-6">Welcome back</h3>
                                        <p class="mb-0">Welcome back! Please enter your details.</p>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ route('login') }}" method="post">
                                            @csrf
                                            <label class="text-white opacity-8">Email Address</label>
                                            <div class="mb-3">
                                                <input type="email" name="email" class="form-control" placeholder="Enter your email address" aria-label="Email" aria-describedby="email-addon">
                                            </div>
                                            <label class="text-white opacity-8">Password</label>
                                            <div class="mb-3">
                                                <input type="password" name="password" class="form-control" placeholder="Enter password" aria-label="Password" aria-describedby="password-addon">
                                            </div>
                                            <div class="d-flex flex-row justify-content-center">
                                                <button type="submit" class="btn btn-primary">Sign In</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                        <p class="mb-4 text-xs mx-auto">
                                            Don't have an account?
                                            <span class="text-danger fw-bold fs-10">Please contact system administrator</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="position-absolute w-40 top-0 end-0 h-100 d-md-block d-none">
                                    <div class="oblique-image position-absolute fixed-top ms-auto h-100 z-index-0 bg-cover ms-n8" style="background-image:url('{{ asset('assets/img/login-bg.jpg') }}')  ">
                                        <div class="blur mt-12 p-4 text-center border border-white border-radius-md position-absolute fixed-bottom m-4">
                                            <h2 class="mt-3 text-dark font-weight-bold">Welcome to LC BPO</h2>
                                            <h6 class="text-dark text-sm mt-2">Optimizing Business Operations, Enhancing Customer Experience</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            @if(session('error'))

                <!-- Modal -->
                <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-danger" id="errorModalLabel">Error</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p class="fs-5 text-dark fw-bold"> {{ session('error') }} </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
                            </div>
                        </div>
                    </div>
                </div>

            
            @endif
        </main>
    </body>
</html>