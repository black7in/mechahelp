@extends('layouts.panel')
@section('content')
    <div class="page-titles">
        <ol class="breadcrumb">
            <li>
                <h5 class="bc-title">Cotizaciones recibidas</h5>
            </li>
        </ol>
    </div>
    <div class="container-fluid">
        @livewire('panel.assistance-requests', ['id' => $id])
    </div>
@endsection
