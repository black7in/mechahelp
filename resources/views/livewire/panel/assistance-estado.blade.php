<div>
    <div class="card box-hover">
        <div class="card-header">
            <h5 class="mb-0">ESTADO DE LA SOLICITUD</h5>
        </div>
        <div class="card-body">
            <ul class="">
                <li class="mb-3">
                    <div class="d-flex justify-content-between">
                        <h6 class="mb-0"><i class="fa-solid fa-heading text-primary me-2"></i>Titulo:</h6>
                        <h6 class="mb-0 text-success">{{ $assistance->title }}</h6>
                    </div>
                </li>
                <li class="mb-3">
                    <div class="d-flex justify-content-between">
                        <h6 class="mb-0"><i class="fa-solid fa-bars-progress text-primary me-2"></i>Estado:</h6>
                        @switch($assistance->status)
                            @case(0)
                                <span class="badge badge-rounded badge-secondary">Enviado</span>
                            @break

                            @case(1)
                                <span class="badge badge-rounded badge-warning">En Esperar</span>
                            @break

                            @case(2)
                                <span class="badge badge-rounded badge-info">En Camino</span>
                            @break

                            @case(3)
                                <span class="badge badge-rounded badge-success">En Proceso</span>
                            @break

                            @case(4)
                                <span class="badge badge-rounded badge-warning">Por Pagar</span>
                            @break

                            @default
                                <span class="badge badge-rounded badge-danger">Finalizado</span>
                        @endswitch
                    </div>
                </li>
                <li class="mb-3">
                    <div class="d-flex justify-content-between">
                        <h6 class="mb-0"><i class="fa-solid fa-wrench text-primary me-2"></i>Taller:</h6>
                        <h6 class="mb-0 text-success">{{ optional($assistance->workshop)->name ?? 'Ninguno' }}</h6>
                    </div>
                </li>
                <li class="mb-3">
                    <div class="d-flex justify-content-between">
                        <h6 class="mb-0"><i class="fa-solid fa-user-ninja text-primary me-2"></i>Mecanico:</h6>
                        <h6 class="mb-0 text-success">
                            @if ($assistance->tarea && $assistance->tarea->technician && $assistance->tarea->technician->user)
                                {{ $assistance->tarea->technician->user->first_name }}
                            @else
                                Ninguno
                            @endif
                        </h6>
                    </div>
                </li>
            </ul>
        </div>
        <div class="card-footer d-flex justify-content-between flex-wrap">
            <a href="{{ route('requests', ['id' => $assistance->id]) }}" class="btn btn-secondary">
                Cotizaciones
                <span class="btn-icon-end"><i class="fa fa-envelope"></i></span>
            </a>
        </div>
    </div>
</div>
