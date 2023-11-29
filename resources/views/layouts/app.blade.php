<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'MechaHelp') }}</title>

    <link rel="shortcut icon" type="image/png" href="../images/favicon.png">
    <link rel="shortcut icon" sizes="192x192" href="../images/favicon.png">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    {{-- <link rel="stylesheet" href="{{ asset('vendor/fontawesome/css/all.css') }}"> --}}
    <link href="{{ asset('vendor/font-awesome/css/all.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendor/plugins/sal/sal.min.css') }}">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/app.css', 'resources/plugins/bootstrap-icons/bootstrap-icons.css'])
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/plugins/plugins.js') }}"></script>
    @livewireStyles
</head>

<body>
    <div id="app">
        <!-- Header -->
        <div class="header right header-color-dark">
            <div class="container">
                <!-- Logo -->
                <div class="header-logo">
                    <h3><a href="{{ route('home') }}">MechaHelp</a></h3>
                </div>
                <!-- Menu -->
                <div class="header-menu">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Compañia</a>
                            <ul class="nav-dropdown">
                                <li class="nav-dropdown-item"><a class="nav-dropdown-link"
                                        href="{{ route('about') }}">Quienes
                                        somos</a></li>
                                <li class="nav-dropdown-item"><a class="nav-dropdown-link" href="#">Lo que
                                        ofrecemos</a></li>
                                <li class="nav-dropdown-item"><a class="nav-dropdown-link" href="#">Como funciona
                                        MechaHelp</a></li>
                                <li class="nav-dropdown-item"><a class="nav-dropdown-link" href="#">Otros</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Seguridad</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Ayuda</a>
                        </li>
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">Iniciar sesión</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="button button-sm button-rounded button-white-2 align-middle" href="#"
                                        data-toggle="modal" data-target="#registerModal">Regístrate</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="#">{{ Auth::user()->first_name }}</a>
                                <ul class="nav-dropdown">
                                    @if (Auth::user()->type === 0)
                                        <li class="nav-dropdown-item"><a class="nav-dropdown-link"
                                                href="{{ route('assistance') }}">Panel de
                                                Control</a>
                                        </li>
                                    @elseif (Auth::user()->type === 1)
                                        <li class="nav-dropdown-item"><a class="nav-dropdown-link"
                                                href="{{ route('w-assistance') }}">Mi
                                                Taller</a>
                                        </li>
                                    @else
                                        <li class="nav-dropdown-item"><a class="nav-dropdown-link"
                                                href="{{ route('w-task') }}">Mis Trabajos</a>
                                        </li>
                                    @endif
                                    <li class="nav-dropdown-item"><a class="nav-dropdown-link" href="#">Perfil</a>
                                    </li>
                                    <li class="nav-dropdown-item"><a class="nav-dropdown-link" href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                    </li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
                <!-- Menu Extra -->
                <div class="header-menu-extra">
                    <ul class="list-inline">
                        <li><a href="#"><i class="bi bi-facebook"></i></a></li>
                        <li><a href="#"><i class="bi bi-twitter"></i></a></li>
                        <li><a href="#"><i class="bi bi-linkedin"></i></a></li>
                    </ul>
                </div>
                <!-- Menu Toggle -->
                <button class="header-toggle">
                    <span></span>
                </button>
            </div><!-- end container -->
        </div>
        <!-- end Header -->
        <main class="">
            @yield('content')
        </main>

        <footer>
            <div class="section-sm bg-dark">
                <div class="container">
                    <div class="row g-4">
                        <div class="col-6 col-sm-6 col-lg-3">
                            <h3 class="uppercase letter-spacing-1">MechaHelp</h3>
                        </div>
                        <div class="col-6 col-sm-6 col-lg-3">
                            <h6 class="font-small fw-medium uppercase">Useful Links</h6>
                            <ul class="list-dash animate-links">
                                <li><a href="#">Acerca de nosotros</a></li>
                                <li><a href="#">Seguridad</a></li>
                                <li><a href="#">Ayuda</a></li>
                                <li><a href="#">Contactos</a></li>
                            </ul>
                        </div>
                        <div class="col-6 col-sm-6 col-lg-3">
                            <h6 class="font-small fw-medium uppercase">Additional Links</h6>
                            <ul class="list-dash animate-links">
                                <li><a href="#">Quienes somos</a></li>
                                <li><a href="#">Que ofrecemos</a></li>
                                <li><a href="#">Como funciona MechaHelp</a></li>
                                <li><a href="#">Otros</a></li>
                            </ul>
                        </div>
                        <div class="col-6 col-sm-6 col-lg-3">
                            <h6 class="font-small fw-medium uppercase">Contacto</h6>
                            <ul class="list-unstyled">
                                <li>121 King St, Melbourne VIC 3000</li>
                                <li>contact@example.com</li>
                                <li>+(123) 456 789 01</li>
                            </ul>
                        </div>
                    </div><!-- end row -->
                </div><!-- end container -->
            </div>
            <div class="bg-black py-4">
                <div class="container">
                    <div class="row align-items-center g-2 g-lg-3">
                        <div class="col-12 col-md-6 text-center text-md-start">
                            <p>&copy; 2023 MechaHelp, All Rights Reserved.</p>
                        </div>
                        <div class="col-12 col-md-6 text-center text-md-end">
                            <ul class="list-inline-sm">
                                <li><a class="button-circle button-circle-sm button-circle-social-facebook"
                                        href="#"><i class="bi bi-facebook"></i></a></li>
                                <li><a class="button-circle button-circle-sm button-circle-social-twitter"
                                        href="#"><i class="bi bi-twitter"></i></a></li>
                                <li><a class="button-circle button-circle-sm button-circle-social-pinterest"
                                        href="#"><i class="bi bi-pinterest"></i></a></li>
                                <li><a class="button-circle button-circle-sm button-circle-social-instagram"
                                        href="#"><i class="bi bi-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div><!-- end row -->
                </div><!-- end container -->
            </div>
        </footer>
        <!-- Scroll to top button -->
        <div class="scrolltotop">
            <a class="button-circle button-circle-md button-circle-dark" href="#"><i
                    class="bi bi-arrow-up"></i></a>
        </div>
        <!-- end Scroll to top button -->
    </div>

    <!-- Modal -->
    <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registerModalLabel">Que tipo de cuenta deseas registrar?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>¿Deseas registrar como empresa o cliente?</p>
                    <div class="row">
                        <div class="col-md-6">
                            <a href="{{ route('register-client') }}" class="btn btn-link btn-lg btn-block"
                                style="text-decoration: none; color: inherit;">
                                <h2 class="text-left">Regístrate para solicitar un servicio de mecánica</h2>
                            </a>

                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('register-workshop') }}" class="btn btn-link btn-lg btn-block"
                                style="text-decoration: none; color: inherit;">
                                <h2>Regístrate en MechaHelp para empresas de mecánica</h2>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <!-- Puedes agregar botones para registrar como empresa o cliente aquí -->
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @livewireScripts
    <x-livewire-alert::scripts />
</body>

</html>
