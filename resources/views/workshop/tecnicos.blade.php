@extends('layouts.workshop')
@section('content')
    <div id="preloader">
        <div class="lds-ripple">
            <div></div>
            <div></div>
        </div>
    </div>
    <livewire:workshop.tecnicos-index />
@endsection
