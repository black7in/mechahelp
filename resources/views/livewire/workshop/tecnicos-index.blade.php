<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <!-- row -->
    <div class="page-titles">
        <ol class="breadcrumb">
            <li>
                <h5 class="bc-title">Mis Tecnicos</h5>
            </li>
        </ol>
        <a class="btn btn-primary btn-sm ms-2" data-bs-toggle="modal"data-bs-target=".bd-example-modal-lg">+ Agregar
            Tecnico</a>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 bst-seller">
                <div class="card h-auto">
                    <div class="card-body p-0">
                        <div class="table-responsive active-projects style-1 dt-filter exports">
                            <div class="tbl-caption">
                            </div>
                            <table id="customer-tbl" class="table shorting">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Especialidad</th>
                                        <th>Estado</th>
                                        <th class="text-center">Show</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($technicians as $tech)
                                        <tr>
                                            <td>
                                                <h6>{{ $tech->user->first_name }}</h6>
                                            </td>
                                            <td>
                                                <h6>{{ $tech->user->last_name }}</h6>
                                            </td>
                                            <td><a href="javascript:void(0)"
                                                    class="text-primary">{{ $tech->user->email }}</td>
                                            <td>
                                                <span>{{ $tech->phone }}</span>
                                            </td>
                                            <td>
                                                <span>{{ $tech->speciality }}</span>
                                            </td>
                                            <td>
                                                @if ($tech->status == 0)
                                                    <span class="badge badge-success light border-0">Active</span>
                                                @else
                                                    <span class="badge badge-danger light border-0">Inactivo</span>
                                                @endif
                                            </td>
                                            <td class="align-middle text-center">
                                                <div class="d-flex justify-content-center">
                                                    <a href="#"
                                                        class="btn btn-primary shadow btn-xs sharp me-1"><i
                                                            class="fa fa-eye"></i></a>
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
        </div>

    </div>

    <!--Modal para registrar user-->
    <div wire:ignore class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <livewire:workshop.tecnicos-create />
            </div>
        </div>
    </div>

</div>
