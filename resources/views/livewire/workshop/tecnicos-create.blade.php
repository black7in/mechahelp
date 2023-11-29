<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <div class="modal-header">
        <h5 class="modal-title">CREAR NUEVO TECNICO</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal">
        </button>
    </div>
    <div class="modal-body">
        <form wire:submit.prevent='create'>
            <div class="row">
                <div class="mb-3 col-md-6">
                    <label class="form-label">Nombre</label>
                    <input type="text" wire:model='first_name' class="form-control" placeholder="Nombre del usuario">
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label">Apellido</label>
                    <input type="text" wire:model='last_name' class="form-control"
                        placeholder="Apellido del usuario">
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label">Correo</label>
                    <input type="text" wire:model='email' class="form-control" placeholder="Correo electronico">
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label">Contraseña</label>
                    <input type="password" wire:model='password' class="form-control"
                        placeholder="Contraseña 8 digitos">
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label">Telefono</label>
                    <input type="number" wire:model='phone' class="form-control" placeholder="Numero de telefono">
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label">Especialidad</label>
                    <input type="text" wire:model='speciality' class="form-control"
                        placeholder="Especialidad del tecnico">
                </div>
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" wire:click="create" class="btn btn-primary">Guardar</button>
    </div>
</div>


