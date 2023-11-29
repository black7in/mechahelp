<div>
    <div class="card" id="card-title-2">
        <div class="card-header flex-wrap">
            <h5 class="card-title">Mis Vehiculos</h5>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal"><span
                    class="btn-icon-start text-info"><i class="fa fa-plus color-info"></i>
                </span>Agregar</button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class=" table" style="min-width: 845px">
                    <thead>
                        <tr>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>Año</th>
                            <th>Placa</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($vehicles as $vehicle)
                            <tr>
                                <th>{{ $vehicle->marca }}</th>
                                <th>{{ $vehicle->modelo }}</th>
                                <th>{{ $vehicle->año }}</th>
                                <th>{{ $vehicle->placa }}</th>
                                <th>
                                    <div class="dropdown ms-auto text-center c-pointer">
                                        <div class="btn-link" data-bs-toggle="dropdown">
                                            <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                    <circle fill="#000000" cx="5" cy="12" r="2"></circle>
                                                    <circle fill="#000000" cx="12" cy="12" r="2"></circle>
                                                    <circle fill="#000000" cx="19" cy="12" r="2"></circle>
                                                </g>
                                            </svg>
                                        </div>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" wire:click="deleted({{ $vehicle->id }})" href="#">Eliminar</a>
                                            <a class="dropdown-item" href="#">Editar</a>
                                        </div>
                                    </div>
                                </th>
                            </tr>
                        @endforeach
                </table>
            </div>
        </div>
        <div class="card-footer d-sm-flex justify-content-between align-items-center">
            <div class="card-footer-link mb-4 mb-sm-0">
                <p class="card-text d-inline">Last updated 3 mins ago</p>
            </div>
        </div>
    </div>

    <div class="modal fade" id="basicModal" style="display: none;" aria-hidden="true" wire:ignore>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Registrar Vehiculo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>

                <div class="modal-body">
                    <!--Agregar formulario-->
                    <form wire:submit.prevent='create'>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Marca</label>
                                <input type="text" wire:model='marca' class="form-control"
                                    placeholder="Ingresa la marca">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Modelo</label>
                                <input type="text" wire:model='modelo' class="form-control"
                                    placeholder="Ingresa el modelo">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Año</label>
                                <input type="text" wire:model='año' class="form-control"
                                    placeholder="Ingresa el año">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Placa</label>
                                <input type="text" wire:model='placa' class="form-control"
                                    placeholder="Numero de placa">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                    <button wire:click="create" class="btn btn-success">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</div>
