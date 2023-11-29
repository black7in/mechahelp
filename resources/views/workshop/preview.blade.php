@extends('layouts.workshop')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center align-items-top">
            <div class="col-md-5">
                @livewire('panel.assistance-details', ['id' => $id])
            </div>
            <div class="col-md-4">
                @livewire('workshop.responder-solicitud', ['id' => $id])
            </div>

        </div>
    </div>
@endsection
