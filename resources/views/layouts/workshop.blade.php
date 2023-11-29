<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'MechaHelp | Panel') }}</title>
    <link rel="shortcut icon" type="image/png" href="../images/favicon.png">
    <link rel="shortcut icon" sizes="192x192" href="../images/favicon.png">

    <link href="{{ asset('vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">

    <link href="{{ asset('vendor/swiper/css/swiper-bundle.min.css') }}" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.6.4/nouislider.min.css">

    <link href="{{ asset('vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">

    <link href="{{ asset('vendor/jvmap/jquery-jvectormap.css') }}" rel="stylesheet">

    <link href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css" rel="stylesheet">

    <link href="{{ asset('vendor/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/lightgallery/css/lightgallery.min.css') }}" rel="stylesheet">
    <!-- tagify-css -->
    <link href="{{ asset('vendor/tagify/dist/tagify.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    @vite(['resources/js/panel.js'])
    @livewireStyles
</head>

<body>
    <div id="main-wrapper">
        <div class="nav-header">
            <a href="{{ route('home') }}" class="brand-logo">
                <svg xmlns="http://www.w3.org/2000/svg" width="160" height="30" viewBox="0 0 120 30"
                    fill="none">
                    <text x="10" y="25" font-family="Arial" font-size="24" fill="white">MechaHelp</text>
                </svg>

            </a>
            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span>
                    <span class="line"></span>
                    <span class="line"></span>
                </div>
            </div>
        </div>


        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                        </div>
                        <ul class="navbar-nav header-right">
                            @livewire('notifications')
                            <li class="nav-item ps-3">
                                <div class="dropdown header-profile2">
                                    <a class="nav-link" href="javascript:void(0);" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <div class="header-info2 d-flex align-items-center">
                                            <div class="header-media menu-icon">
                                                <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M10.986 14.0673C7.4407 14.0673 4.41309 14.6034 4.41309 16.7501C4.41309 18.8969 7.4215 19.4521 10.986 19.4521C14.5313 19.4521 17.5581 18.9152 17.5581 16.7693C17.5581 14.6234 14.5505 14.0673 10.986 14.0673Z"
                                                        stroke="#888888" stroke-linecap="round" stroke-linejoin="round">
                                                    </path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M10.986 11.0054C13.3126 11.0054 15.1983 9.11881 15.1983 6.79223C15.1983 4.46564 13.3126 2.57993 10.986 2.57993C8.65944 2.57993 6.77285 4.46564 6.77285 6.79223C6.76499 9.11096 8.63849 10.9975 10.9563 11.0054H10.986Z"
                                                        stroke="#888888" stroke-linecap="round" stroke-linejoin="round">
                                                    </path>
                                                </svg>
                                            </div>
                                            <div class="header-info">
                                                <h6>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h6>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end" style="">
                                        <div class="card border-0 mb-0">
                                            <div class="card-body px-0 py-2">
                                                <a href="javascript:void(0);" class="dropdown-item ai-icon ">
                                                    <svg width="20" height="20" viewBox="0 0 24 24"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M17.9026 8.85114L13.4593 12.4642C12.6198 13.1302 11.4387 13.1302 10.5992 12.4642L6.11844 8.85114"
                                                            stroke="var(--primary)" stroke-width="1.5"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M16.9089 21C19.9502 21.0084 22 18.5095 22 15.4384V8.57001C22 5.49883 19.9502 3 16.9089 3H7.09114C4.04979 3 2 5.49883 2 8.57001V15.4384C2 18.5095 4.04979 21.0084 7.09114 21H16.9089Z"
                                                            stroke="var(--primary)" stroke-width="1.5"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>

                                                    <span class="ms-2">Message </span>
                                                </a>
                                                <a href="email-inbox.html" class="dropdown-item ai-icon ">
                                                    <svg width="20" height="20" viewBox="0 0 24 24"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M12 17.8476C17.6392 17.8476 20.2481 17.1242 20.5 14.2205C20.5 11.3188 18.6812 11.5054 18.6812 7.94511C18.6812 5.16414 16.0452 2 12 2C7.95477 2 5.31885 5.16414 5.31885 7.94511C5.31885 11.5054 3.5 11.3188 3.5 14.2205C3.75295 17.1352 6.36177 17.8476 12 17.8476Z"
                                                            stroke="var(--primary)" stroke-width="1.5"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                        <path
                                                            d="M14.3888 20.8572C13.0247 22.372 10.8967 22.3899 9.51947 20.8572"
                                                            stroke="var(--primary)" stroke-width="1.5"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>

                                                    <span class="ms-2">Notification </span>
                                                </a>
                                            </div>
                                            <a href="page-login.html" class="dropdown-item ai-icon">
                                                <svg class="profle-logout" xmlns="http://www.w3.org/2000/svg"
                                                    width="18" height="18" viewBox="0 0 24 24" fill="none"
                                                    stroke="#ff7979" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                                    <polyline points="16 17 21 12 16 7"></polyline>
                                                    <line x1="21" y1="12" x2="9"
                                                        y2="12"></line>
                                                </svg>
                                                <span class="ms-2 text-danger">Logout </span>
                                            </a>
                                        </div>
                                    </div>

                                </div>
                    </div>
                    </li>
                    </ul>
            </div>
            </nav>
        </div>
    </div>

    <div class="deznav">
        <div class="deznav-scroll">
            <ul class="metismenu" id="menu">
                @if (Auth::user()->type === 1)
                    <li>
                        <a href="{{ route('w-assistance') }}" class="" aria-expanded="false">
                            <div class="menu-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                    viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                    <path
                                        d="M224 0a128 128 0 1 1 0 256A128 128 0 1 1 224 0zM178.3 304h91.4c11.8 0 23.4 1.2 34.5 3.3c-2.1 18.5 7.4 35.6 21.8 44.8c-16.6 10.6-26.7 31.6-20 53.3c4 12.9 9.4 25.5 16.4 37.6s15.2 23.1 24.4 33c15.7 16.9 39.6 18.4 57.2 8.7v.9c0 9.2 2.7 18.5 7.9 26.3H29.7C13.3 512 0 498.7 0 482.3C0 383.8 79.8 304 178.3 304zM436 218.2c0-7 4.5-13.3 11.3-14.8c10.5-2.4 21.5-3.7 32.7-3.7s22.2 1.3 32.7 3.7c6.8 1.5 11.3 7.8 11.3 14.8v30.6c7.9 3.4 15.4 7.7 22.3 12.8l24.9-14.3c6.1-3.5 13.7-2.7 18.5 2.4c7.6 8.1 14.3 17.2 20.1 27.2s10.3 20.4 13.5 31c2.1 6.7-1.1 13.7-7.2 17.2l-25 14.4c.4 4 .7 8.1 .7 12.3s-.2 8.2-.7 12.3l25 14.4c6.1 3.5 9.2 10.5 7.2 17.2c-3.3 10.6-7.8 21-13.5 31s-12.5 19.1-20.1 27.2c-4.8 5.1-12.5 5.9-18.5 2.4l-24.9-14.3c-6.9 5.1-14.3 9.4-22.3 12.8l0 30.6c0 7-4.5 13.3-11.3 14.8c-10.5 2.4-21.5 3.7-32.7 3.7s-22.2-1.3-32.7-3.7c-6.8-1.5-11.3-7.8-11.3-14.8V454.8c-8-3.4-15.6-7.7-22.5-12.9l-24.7 14.3c-6.1 3.5-13.7 2.7-18.5-2.4c-7.6-8.1-14.3-17.2-20.1-27.2s-10.3-20.4-13.5-31c-2.1-6.7 1.1-13.7 7.2-17.2l24.8-14.3c-.4-4.1-.7-8.2-.7-12.4s.2-8.3 .7-12.4L343.8 325c-6.1-3.5-9.2-10.5-7.2-17.2c3.3-10.6 7.7-21 13.5-31s12.5-19.1 20.1-27.2c4.8-5.1 12.4-5.9 18.5-2.4l24.8 14.3c6.9-5.1 14.5-9.4 22.5-12.9V218.2zm92.1 133.5a48.1 48.1 0 1 0 -96.1 0 48.1 48.1 0 1 0 96.1 0z" />
                                </svg>
                            </div>
                            <span class="nav-text">Mis Asistencias</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('w-technician') }}" class="" aria-expanded="false">
                            <div class="menu-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                    viewBox="0 0 512 512">
                                    <path
                                        d="M165.4 96H346.6c13.6 0 25.7 8.6 30.2 21.4L402.9 192H109.1l26.1-74.6c4.5-12.8 16.6-21.4 30.2-21.4zm-90.6 .3L39.6 196.8C16.4 206.4 0 229.3 0 256v80c0 23.7 12.9 44.4 32 55.4V448c0 17.7 14.3 32 32 32H96c17.7 0 32-14.3 32-32V400H384v48c0 17.7 14.3 32 32 32h32c17.7 0 32-14.3 32-32V391.4c19.1-11.1 32-31.7 32-55.4V256c0-26.7-16.4-49.6-39.6-59.2L437.2 96.3C423.7 57.8 387.4 32 346.6 32H165.4c-40.8 0-77.1 25.8-90.6 64.3zM208 272h96c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H208c-8.8 0-16-7.2-16-16V288c0-8.8 7.2-16 16-16zM48 280c0-13.3 10.7-24 24-24h32c13.3 0 24 10.7 24 24s-10.7 24-24 24H72c-13.3 0-24-10.7-24-24zm360-24h32c13.3 0 24 10.7 24 24s-10.7 24-24 24H408c-13.3 0-24-10.7-24-24s10.7-24 24-24z" />
                                </svg>
                            </div>
                            <span class="nav-text">Mis Tecnicos</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('w-wallet') }}" class="" aria-expanded="false">
                            <div class="menu-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                    viewBox="0 0 512 512">
                                    <path
                                        d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V192c0-35.3-28.7-64-64-64H80c-8.8 0-16-7.2-16-16s7.2-16 16-16H448c17.7 0 32-14.3 32-32s-14.3-32-32-32H64zM416 272a32 32 0 1 1 0 64 32 32 0 1 1 0-64z" />
                                </svg>
                            </div>
                            <span class="nav-text">Wallet</span>
                        </a>
                    </li>
                @endif
                @if (Auth::user()->type === 2)
                    <li>
                        <a href="{{ route('w-task') }}" class="" aria-expanded="false">
                            <div class="menu-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                    viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                    <path
                                        d="M224 0a128 128 0 1 1 0 256A128 128 0 1 1 224 0zM178.3 304h91.4c11.8 0 23.4 1.2 34.5 3.3c-2.1 18.5 7.4 35.6 21.8 44.8c-16.6 10.6-26.7 31.6-20 53.3c4 12.9 9.4 25.5 16.4 37.6s15.2 23.1 24.4 33c15.7 16.9 39.6 18.4 57.2 8.7v.9c0 9.2 2.7 18.5 7.9 26.3H29.7C13.3 512 0 498.7 0 482.3C0 383.8 79.8 304 178.3 304zM436 218.2c0-7 4.5-13.3 11.3-14.8c10.5-2.4 21.5-3.7 32.7-3.7s22.2 1.3 32.7 3.7c6.8 1.5 11.3 7.8 11.3 14.8v30.6c7.9 3.4 15.4 7.7 22.3 12.8l24.9-14.3c6.1-3.5 13.7-2.7 18.5 2.4c7.6 8.1 14.3 17.2 20.1 27.2s10.3 20.4 13.5 31c2.1 6.7-1.1 13.7-7.2 17.2l-25 14.4c.4 4 .7 8.1 .7 12.3s-.2 8.2-.7 12.3l25 14.4c6.1 3.5 9.2 10.5 7.2 17.2c-3.3 10.6-7.8 21-13.5 31s-12.5 19.1-20.1 27.2c-4.8 5.1-12.5 5.9-18.5 2.4l-24.9-14.3c-6.9 5.1-14.3 9.4-22.3 12.8l0 30.6c0 7-4.5 13.3-11.3 14.8c-10.5 2.4-21.5 3.7-32.7 3.7s-22.2-1.3-32.7-3.7c-6.8-1.5-11.3-7.8-11.3-14.8V454.8c-8-3.4-15.6-7.7-22.5-12.9l-24.7 14.3c-6.1 3.5-13.7 2.7-18.5-2.4c-7.6-8.1-14.3-17.2-20.1-27.2s-10.3-20.4-13.5-31c-2.1-6.7 1.1-13.7 7.2-17.2l24.8-14.3c-.4-4.1-.7-8.2-.7-12.4s.2-8.3 .7-12.4L343.8 325c-6.1-3.5-9.2-10.5-7.2-17.2c3.3-10.6 7.7-21 13.5-31s12.5-19.1 20.1-27.2c4.8-5.1 12.4-5.9 18.5-2.4l24.8 14.3c6.9-5.1 14.5-9.4 22.5-12.9V218.2zm92.1 133.5a48.1 48.1 0 1 0 -96.1 0 48.1 48.1 0 1 0 96.1 0z" />
                                </svg>
                            </div>
                            <span class="nav-text">Mis Trabajos</span>
                        </a>
                    </li>
                @endif
                <li>
                    <a href="{{ route('w-profile') }}" class="" aria-expanded="false">
                        <div class="menu-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                viewBox="0 0 448 512">
                                <path
                                    d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z" />
                            </svg>
                        </div>
                        <span class="nav-text">Perfil</span>
                    </a>
                </li>
                <li>
                    <a href="#"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        style="color:red" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 512 512">
                            <path
                                d="M502.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 224 192 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l210.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128zM160 96c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 32C43 32 0 75 0 128L0 384c0 53 43 96 96 96l64 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-64 0c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l64 0z" />
                        </svg>
                        <span class="nav-text">Log Out</span>
                    </a>

                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </ul>
        </div>
    </div>

    <div class="content-body">
        <div class="">
            <main class="">
                @yield('content')
            </main>
        </div>
    </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{ asset('vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('vendor/lightgallery/js/lightgallery-all.min.js') }}"></script>
    {{-- <script src="{{ asset('vendor/chart.js/Chart.bundle.min.js') }}"></script> --}}
    <script src="{{ asset('vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>


    <script src="{{ asset('vendor/draggable/draggable.js') }}"></script>


    <!-- tagify -->
    <script src="{{ asset('vendor/tagify/dist/tagify.js') }}"></script>

    <script src="{{ asset('vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/js/buttons.html5.min.js') }}"></script>
    {{-- <script src="{{ asset('vendor/datatables/js/jszip.min.js') }}"></script> --}}
    <script src="{{ asset('js/plugins-init/datatables.init.js') }}"></script>

    <!-- Apex Chart -->

    <script src="{{ asset('vendor/bootstrap-datetimepicker/js/moment.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>


    <!-- Vectormap -->
    {{-- <script src="{{ asset('vendor/jqvmap/js/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('vendor/jqvmap/js/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('vendor/jqvmap/js/jquery.vmap.usa.js') }}"></script> --}}

    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="{{ asset('js/deznav-init.js') }}"></script>

    @livewireScripts
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <x-livewire-alert::scripts />

    @auth
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Echo.private('App.Models.User.' + {{ auth()->user()->id }})
                    .notification((notification) => {
                        console.log(notification.type);
                    });
            });
        </script>
    @endauth


</body>

</html>
