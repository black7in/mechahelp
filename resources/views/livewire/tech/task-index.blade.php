<div>
    <div class="card">
        <div class="card-header border-0 pb-0">
            <h5 class="card-title">Mis Trabajos</h5>
        </div>
        <div class="card-body" style="min-height: 150">
            <div class="table-responsive active-projects task-table">
                <table id="empoloyeestbl2" class="table">
                    <thead>
                        <tr>
                            <th>Titulo</th>
                            <th>Estado</th>
                            <th>Inicio</th>
                            <th>Finalizado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $task)
                            <tr>
                                <td>{{ $task->assistance->title }}</td>
                                <td>
                                    @switch($task->status)
                                        @case(0)
                                            <span class="badge badge-rounded badge-success">En Proceso</span>
                                        @break

                                        @case(1)
                                            <span class="badge badge-rounded badge-danger">Terminado</span>
                                        @break
                                    @endswitch
                                </td>
                                <td>
                                    {{ $task->created_at->format('d/m/Y') }}
                                </td>
                                <td>
                                    {{ $task->updated_at->format('d/m/Y') }}
                                </td>
                                <td class="align-middle text-center">
                                    {{-- <div class="d-flex justify-content-center">
                                        <a href=""
                                            class="btn btn-primary shadow btn-xs sharp me-1"><i
                                                class="fa fa-eye"></i></a>
                                    </div> --}}
                                    <div class="dropdown custom-dropdown">
                                        <div class="btn sharp btn-primary tp-btn" data-bs-toggle="dropdown">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <circle fill="#000000" cx="12" cy="5" r="2" />
                                                    <circle fill="#000000" cx="12" cy="12" r="2" />
                                                    <circle fill="#000000" cx="12" cy="19" r="2" />
                                                </g>
                                            </svg>
                                        </div>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" wire:click="emitirAsistencia({{$task->assistance->id}})">Detalles</a>
                                            @if ($task->assistance->status == 2)
                                                <a class="dropdown-item" wire:click="marcarLlegada({{$task->id}})">Marcar LLegada</a>
                                            @endif
                                        
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
