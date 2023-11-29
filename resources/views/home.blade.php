@extends('layouts.app')
@section('content')
    <!-- Hero section -->
    <div class="section-fullscreen">
        <div class="container">
            <div class="position-middle">
                <div class="row align-items-center">
                    <div class="col-12 col-lg-6 text-center text-lg-start">
                        <h1 class="display-4 fw-medium mb-3">MechaHelp asistencia con un solo click</h1>
                        <p class="font-large">Bienvenido a Mecha Help, tu plataforma de asistencia vehicular. Conectamos a
                            conductores con mecánicos expertos y a talleres de confianza. ¡Tu vehículo siempre en buenas
                            manos!<br>¿Eres un taller mecánico buscando oportunidades? ¡Únete a Mecha Help ahora!.</p>
                        <ul class="list-inline-sm mt-4 mt-lg-5">
                            <li>
                                <a class="button button-md button-rounded button-white button-shadow button-hover-float"
                                    href="#"><i class="bi bi-apple"></i>App Store</a>
                            </li>
                            <li>
                                <a class="button button-md button-rounded button-white button-shadow button-hover-float"
                                    href="#"><i class="bi bi-android"></i>Play Store</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-12 col-lg-4 offset-lg-2 d-none d-lg-block">
                        <img src="../images/mobile-app-hero.png" alt="">
                    </div>
                </div><!-- end row -->
            </div><!-- end middle -->
        </div><!-- end container -->
    </div>
    <!-- end Hero section -->
    <div class="container">
        <div class="row text-center">
            <div class="col-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3">
                <h1 class="display-4">Suscripciones para Empresas</h1>
                <p>Si quieres suscribir tu Taller de mecanica y trabajar con nosotros adquiere uno de nuestros planes..</p>
            </div>
        </div>
    </div>
    <!-- About section -->
    <div class="section-lg">
        @livewire('suscribciones')
    </div>
    <!-- end About section -->
@endsection
