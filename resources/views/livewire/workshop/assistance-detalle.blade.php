<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <div class="card" style="min-height: 600px">
        <div class="card-header border-0">
            <h4 class="heading mb-0">ESTADO DE ASISTENCIA</h4>
        </div>
        <div class="card-body">

            @if ($assistance)
                <ul class="">
                    <li class="mb-3">
                        <div class="d-flex justify-content-between">
                            <h6 class="mb-0"><i class="fa-solid fa-heading text-primary me-2"></i>Titulo:</h6>
                            <h6 class="mb-0 text-success">{{ $assistance->title }}</h6>
                        </div>
                    </li>
                    <li class="mb-3">
                        <div class="d-flex justify-content-between">
                            <h6 class="mb-0"><i class="fa-solid fa-heading text-primary me-2"></i>Cliente:</h6>
                            <h6 class="mb-0 text-success">{{ $assistance->client->user->first_name }}
                                {{ $assistance->client->user->last_name }}</h6>
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
                                    <span class="badge badge-rounded badge-warning">En Espera</span>
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
                                @if ($assistance->tarea)
                                    {{ $assistance->tarea->technician->user->first_name }}
                                @else
                                    No asignado
                                @endif
                            </h6>
                        </div>
                    </li>

                    <li class="mb-3">
                        @if (!$assistance->tarea)
                            <h5>Asignar Mecanico para dar Soporte</h5>
                            <div class="input-group">
                                <select wire:model="tecnico" class="default-select form-control wide bleft"
                                    @if ($assistance->tarea) disabled @endif>
                                    <option value="">Seleccionar Técnico</option>
                                    @foreach ($assistance->workshop->technicians as $tech)
                                        <option value="{{ $tech->id }}">{{ $tech->user->first_name }}</option>
                                    @endforeach
                                </select>
                                <button class="btn btn-primary" wire:click='asignarTecnico' type="button"
                                    @if ($assistance->tarea) disabled @endif>
                                    Asignar
                                </button>
                            </div>
                        @elseif($assistance->tarea->status == 1)
                            <h5>Reporte de Trabajo</h5>
                            <div class="read-wapper dz-scroll" id="read-content">
                                <div class="read-content">
                                    <div class="media pt-3 d-sm-flex d-block">
                                        <hr>
                                        <div class="read-content-body">
                                            <h5 class="mb-4">{{ $assistance->tarea->title }}</h5>
                                            <p class="mb-2">{{ $assistance->tarea->detail }}</p>
                                            <h5 class="pt-3">Ref: {{ $assistance->tarea->ref }}</h5>
                                            <p><strong>{{ $assistance->tarea->technician->user->first_name }}</strong>
                                            </p>
                                            <hr>
                                        </div>
                                    </div>
                                    <div class="text-end">
                                        @if ($assistance->status == 3)
                                        <div class="form-group">
                                            <label for="">Cantidad a cobrar</label>
                                            <input wire:model='price' type="number" placeholder="Monto" class="form-control">
                                        </div>
                                            <button wire:click="solicitarCobro()" class="btn btn-primary mb-3 mt-2" type="button">Solicitar Pago</button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endif
                    </li>

                </ul>
            @endif
        </div>
    </div>
</div>
