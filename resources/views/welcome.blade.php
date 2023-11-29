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

    <!-- About section -->
    <div class="section-lg">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3 text-center">
                    <h6
                        class="d-inline-block bg-gray border-radius px-3 py-2 line-height-140 font-small uppercase letter-spacing-1 mb-3">
                        <span class="text-gradient-6">Introducing Mono!</span>
                    </h6>
                    <h2>Vivamus elementum semper nisi. Aenean vulputate eleifend</h2>
                </div>
            </div><!-- end row -->
            <div class="row g-4 mt-4 mt-lg-5 icon-5xl text-center">
                <!-- Feature box 1 -->
                <div class="col-12 col-lg-4">
                    <div class="bg-color-turquiose-02 p-4 p-lg-5 border-radius-1 hover-float hover-shadow"
                        data-sal="slide-up" data-sal-delay="50">
                        <div class="text-dark mb-2">
                            <i class="bi bi-star"></i>
                        </div>
                        <h4 class="text-dark">Ultra Performance</h4>
                        <p class="text-dark-06">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Cum sociis natoque
                            penatibus et magnis dis</p>
                    </div>
                </div>
                <!-- Feature box 2 -->
                <div class="col-12 col-lg-4">
                    <div class="bg-color-blue-02 p-4 p-lg-5 border-radius-1 hover-float hover-shadow" data-sal="slide-up"
                        data-sal-delay="50">
                        <div class="text-dark mb-2">
                            <i class="bi bi-columns-gap"></i>
                        </div>
                        <h4 class="text-dark">Pixel Perfect Design</h4>
                        <p class="text-dark-06">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Cum sociis natoque
                            penatibus et magnis dis</p>
                    </div>
                </div>
                <!-- Feature box 3 -->
                <div class="col-12 col-lg-4">
                    <div class="bg-color-purple-02 p-4 p-lg-5 border-radius-1 hover-float hover-shadow" data-sal="slide-up"
                        data-sal-delay="50">
                        <div class="text-dark mb-2">
                            <i class="bi bi-arrow-repeat"></i>
                        </div>
                        <h4 class="text-dark">Lifetime Free Updates</h4>
                        <p class="text-dark-06">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Cum sociis natoque
                            penatibus et magnis dis</p>
                    </div>
                </div>
            </div><!-- end row -->
        </div><!-- end container -->
    </div>
    <!-- end About section -->
@endsection
