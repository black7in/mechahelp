<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <div class="card box-hover">
        <div class="card-header">
            <h5>ENVIAR COTIZACION</h5>
            @if ($isResp->isNotEmpty())
                <span class="text-danger">Ya enviaste una cotización</span>
            @endif
        </div>
        <div class="card-body">
            <form class="finance-hr" wire:submit="create">
                <div class="form-group mb-3">
                    <label class="text-secondary font-w500">Titulo<span class="text-danger">*</span>
                    </label>
                    <input type="text" wire:model="title" name="title" class="form-control"
                        placeholder="Titulo del mensaje">

                    @error('title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label class="text-secondary font-w500">Descripcion<span class="text-danger">*</span>
                    </label>
                    <textarea wire:model="description" name="description" rows="4" class="form-control" cols="50"
                        placeholder="Describe el detalle de tu cotizacion"></textarea>
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label class="text-secondary">Tiempo estimado<span class="text-danger">*</span>
                    </label>
                    <input type="number" name="time" wire:model="time" class="form-control"
                        placeholder="Tiempo de llegada en minutos">
                    @error('time')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label>Precio aproximado<span class="text-danger">*</span>
                    </label>
                    <div class="input-group">
                        <div class="input-group-text">Bs</div>
                        <input type="number" name="price" wire:model="price" class="form-control" placeholder="5000">
                    </div>
                    @error('price')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                @if ($isResp->isNotEmpty())
                    <button type="button" class="btn btn-secondary mb-3" disabled>Enviado</button>
                @else
                    <button type="submit" class="btn btn-primary mb-3">Enviar</button>
                @endif
            </form>
        </div>
        <div class="card-footer d-flex justify-content-between flex-wrap">
        </div>
    </div>
</div>
