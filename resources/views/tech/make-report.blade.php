@extends('layouts.workshop')
@section('content')
    <div id="preloader">
        <div class="lds-ripple">
            <div></div>
            <div></div>
        </div>
    </div>
    <div class="container-fluid">
        @livewire('tech.enviar-reporte', ['id' => $id])
    </div>
@endsection
