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
            <div class="col-xl-7">
                <livewire:workshop.assistances-table />
            </div>

            <div class="col-xl-5">
                @livewire('workshop.assistance-detalle')
            </div>
        </div>
    </div>
@endsection
