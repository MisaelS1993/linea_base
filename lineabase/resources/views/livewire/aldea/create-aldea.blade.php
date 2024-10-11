<!-- Modal -->
@if($isModalOpen)
<div class="modal fade text-left show" data-bs-backdrop="static" data-bs-keyboard="false" style="display: block;" tabindex="-1" aria-labelledby="Boleta" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered"> <!-- Centrado -->
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $aldea_id ? 'Editar Aldea' : 'Crear Nueva Aldea' }}</h1>
                <button type="button" class="btn-close" wire:click="closeModal()" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="store">
                    <!-- Campo para la descripción de la aldea -->
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <input type="text" id="descripcion" wire:model="descripcion" class="form-control" required>
                        @error('descripcion') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
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

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" wire:click="closeModal()">Cancelar</button>
                        <button type="submit" class="btn btn-primary">{{ $aldea_id ? 'Actualizar' : 'Guardar' }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endif
