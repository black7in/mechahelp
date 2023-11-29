<div>
    <div class="card">
        <div class="card-body p-0">
            <div class="table-responsive active-projects task-table">
                <div class="tbl-caption">
                    <h3 class="heading mb-0">Mis Asistencias</h3>
                </div>
                <table id="empoloyeestbl2" class="table">
                    <thead>
                        <tr>
                            <th>Titulo</th>
                            <th>Tecnico</th>
                            <th>Fecha Inicio</th>
                            <th>Fecha Fin</th>
                            <th>Estado</th>
                            <th class="text-end">Show</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach ($assistances as $ass)
                                <td>
                                    {{ $ass->title }}
                                </td>
                                <td>
                                    Por asignar
                                </td>
                                <td><span>inicio del laburo</span></td>
                                <td>
                                    <span>fin laburo</span>
                                </td>
                                <td>
                                    @switch($ass->status)
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
                                </td>
                                <td class="align-middle text-center">
                                    <div class="d-flex justify-content-center">
                                        {{-- <a href="{{ route('w-showAssistance', ['id' => $ass->id]) }}" class="btn btn-primary shadow btn-xs sharp me-1"><i
                                                class="fa fa-eye"></i></a> --}}
                                        <a wire:click="emitirAsistencia({{ $ass->id }})"
                                            class="btn btn-primary shadow btn-xs sharp me-1"><i
                                                class="fa fa-eye"></i></a>
                                    </div>
                                </td>
                            @endforeach

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
