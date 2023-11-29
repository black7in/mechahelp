@extends('layouts.panel')
@section('content')
    <div id="preloader">
        <div class="lds-ripple">
            <div></div>
            <div></div>
        </div>
    </div>

    <div class="container-fluid">
        @livewire('panel.metodos-pago')
    </div>
@endsection
