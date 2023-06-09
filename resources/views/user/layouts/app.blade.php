<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="kr">
    <head>
        <title>Hustlers</title>
        <meta charset="utf-8">        
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">        
        <link rel="shortcut icon" href="{{asset('user_assets/images/favicon.ico')}}" />
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <link rel="stylesheet" href="{{asset('user_assets/css/nucleo-icons.css')}}">
        <link rel="stylesheet" href="{{asset('user_assets/css/nucleo-svg.css')}}">        
        <link rel="stylesheet" href="{{asset('user_assets/css/material-dashboard.css?v=3.0.0')}}">
        <link rel="stylesheet" href="/plugins/select2/css/select2.min.css">
        <link rel="stylesheet" href="/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
        <link rel="stylesheet" href="{{asset('user_assets/css/custom.css')}}">
        @yield('third_party_stylesheets')        
        @stack('page_css')

    </head>
    <body class="g-sidenav-show  bg-gray-200">        
        <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
            <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
                <img src="{{asset('user_assets/images/logo.png')}}" class="navbar-brand-img h-100" alt="main_logo">                
            </a>
            </div>
            <hr class="horizontal light mt-0 mb-2">
            <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">                
                @include('user.layouts.menu')
            </div>            
        </aside>
        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            <!-- Navbar -->
            <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
                <div class="container-fluid py-1 px-3">  
                    <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <ul class="navbar-nav  ms-md-auto justify-content-end">
                        <li class="nav-item d-flex align-items-center">
                            <a class="btn btn-outline-primary btn-sm mb-0 me-3" target="_blank">
                                <i class="material-icons opacity-10">payment</i>    
                                <span class="user_money" style="margin-left:10px; font-weight:700;">
                                     {{number_format(Auth::user()->money, 2, '.', ',')}}
                                </span>
                            </a>
                        </li>
                        <li class="nav-item d-flex align-items-center">
                            
                            <a class="btn btn-outline-warning btn-sm mb-0 me-3 " target="_blank">
                                <i class="material-icons opacity-10">payment</i>    
                                <span class="user_cart_cnt" style="margin-left:10px; font-weight:700;">payment</i> 0</span>
                            </a>
                        </li>
                        <li class="nav-item dropdown pe-2 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                <img 
                                    @if (Auth::check() && Auth::user()->image != "")
                                        src="{{Auth::user()->image}}"
                                    @else
                                        src="{{asset('user_assets/images/logo.png')}}"
                                    @endif 
                                    class="avatar avatar-sm  me-3"
                                />
                            </a>
                            <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                                <li>
                                    <a class="dropdown-item border-radius-md" href="{{route('user.mypage')}}">
                                        <div class="d-flex py-1">
                                            <div class="avatar avatar-sm bg-info  me-3  my-auto">
                                                <i class="material-icons opacity-10">info</i>
                                            </div>  
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="text-sm font-weight-normal mb-1">
                                                    My Info
                                                </h6>                                                
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item border-radius-md" href="#"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">                                    
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none" style="display:none;">
                                            @csrf
                                        </form>
                                        <div class="d-flex py-1">
                                            <div class="avatar avatar-sm bg-primary  me-3  my-auto">
                                                <i class="material-icons opacity-10">logout</i>
                                            </div>  
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="text-sm font-weight-normal mb-1">
                                                    Log out
                                                </h6>                                                  
                                                <p class="text-xs text-secondary mb-0">
                                                    <i class="fa fa-clock me-1"></i>
                                                    {{ Auth::user()->str_id }}: Join Date: {{ Auth::user()->created_at->format('Y-m-d') }}
                                                </p>                                            
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="container-fluid">                
                @yield('content')
            </div>
        </main>

        <script src="/plugins/jquery/jquery.min.js"></script>
        <script>
            $( document ).ajaxError(function( event, jqxhr, settings, thrownError ) {
                if (typeof settings === "string" && (settings.indexOf('401') > -1 || settings.indexOf('419') > -1) ) {
                    location.href="/login";
                }
            });              
        </script>
       
        <script src="/plugins/jquery-ui/jquery-ui.min.js"></script>
        <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
        <script src="{{asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
        <script src="{{asset('plugins/datatables-checkboxes/js/dataTables.checkboxes.min.js')}}"></script>
        
        <script src="/plugins/select2/js/select2.full.min.js"></script>

        <script src="{{asset('user_assets/js/popper.min.js')}}"></script>
        <script src="{{asset('user_assets/js/bootstrap.min.js')}}"></script>
        
        <script src="{{asset('user_assets/js/perfect-scrollbar.min.js')}}"></script>
        <script src="{{asset('user_assets/js/smooth-scrollbar.min.js')}}"></script>
        <script>
            var win = navigator.platform.indexOf('Win') > -1;
            if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
            }
        </script>
        <!-- Github buttons -->
        <script async defer src="https://buttons.github.io/buttons.js"></script>
        <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="{{asset('user_assets/js/material-dashboard.min.js?v=3.0.0')}}"></script>        
                
        <script>
            getRealTimeInfo();
            setInterval(getRealTimeInfo, 5000);
            function getRealTimeInfo(){
                var action = '/realtime_info';
                $.ajax({
                    url: action,
                    type: "GET",
                    dataType: 'json',
                    success: function ({status, data}) {
                        $('.user_money').html(new Intl.NumberFormat('en-US',  { minimumFractionDigits: 2, }).format(data.user_info.money));
                        $('.user_cart_cnt').html(data.user_info.cart_cnt);
                    },
                    error: function (data) {
                    }
                });
        }
        </script>
        @yield('third_party_scripts')
        @yield('script')
        @stack('page_scripts')
    </body>
</html>
