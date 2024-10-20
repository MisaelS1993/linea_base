<!-- Modal -->
@if($isModalOpen)
<div class="modal fade show" id="boleta" tabindex="-1" aria-labelledby="boleta" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered"> <!-- Centrado -->
        <div class="modal-content bg-success-subtle border border-success shadow-lg p-3 mb-5">
            <div class="modal-header bg-success text-light">
                <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $aldea_id ? 'Editar Aldea' : 'Crear Nueva Aldea' }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal()" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="store">
                    
                    <!-- Selección del municipio al que pertenece la aldea -->
                    <div class="mb-3">
                        <label for="municipio_id" class="form-label">Municipio</label>
                        <select id="municipio_id" wire:model="municipio_id" class="form-control" required>
                            <option value="">Seleccione un municipio</option>
                            @foreach($municipios as $municipio)
                                <option value="{{ $municipio->id }}">{{ $municipio->descripcion }}</option>
                            @endforeach
                        </select>
                        @error('municipio_id') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <!-- Campo para la descripción de la aldea -->
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Comunidad</label>
                        <input type="text" id="descripcion" wire:model="descripcion" class="form-control" required>
                        @error('descripcion') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn" data-bs-dismiss="modal" wire:click="closeModal()">Cancelar</button>
                        <button type="submit" class="btn btn-success">{{ $aldea_id ? 'Actualizar' : 'Guardar' }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endif
