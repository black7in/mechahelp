@extends('layouts.panel')
@section('content')

    <div id="preloader">
        <div class="lds-ripple">
            <div></div>
            <div></div>
        </div>
    </div>
    @livewire('pagar-servicio', ['id' => $id])

@endsection
