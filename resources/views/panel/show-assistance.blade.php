@extends('layouts.panel')
@section('content')
    <div class="page-titles">
        <ol class="breadcrumb">
            <li>
                <h5 class="bc-title">Mis Tecnicos</h5>
            </li>
        </ol>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-5">
                @livewire('panel.assistance-details', ['id' => $id])
            </div>
            {{-- <div class="col-xl-4">
                @livewire('panel.assistance-chat', ['id' => $id])
            </div> --}}
            <div class="col-xl-7">
                @livewire('panel.assistance-estado', ['id' => $id])
            </div>
        </div>
    </div>
@endsection
