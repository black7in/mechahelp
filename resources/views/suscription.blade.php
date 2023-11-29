@extends('layouts.app')
@section('content')
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
