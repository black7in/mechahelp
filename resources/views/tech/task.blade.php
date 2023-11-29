@extends('layouts.workshop')
@section('content')
    <div id="preloader">
        <div class="lds-ripple">
            <div></div>
            <div></div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-7">
                <livewire:tech.task-index />
            </div>
            
            <div class="col-md-5">
                @livewire('tech.assistance-detalle')
            </div>
        </div>
    </div>
@endsection
