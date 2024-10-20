<!-- Modal -->
@if($isModalOpen)
<div class="modal fade show"id="boleta" tabindex="-1" aria-labelledby="boleta" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered"> <!-- Centrado -->
        <div class="modal-content bg-success-subtle border border-success shadow-lg p-3 mb-5">
            <div class="modal-header bg-success text-light">
                <h1 class="modal-title  fs-5" id="exampleModalLabel">{{ $municipio_id ? 'Editar Municipio' : 'Crear Nuevo Municipio' }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal()" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="store">
                    
                    <!-- Selección del departamento al que pertenece el municipio -->
                    <div class="mb-3">
                        <label for="departamento_id" class="form-label">Departamento</label>
                        <select id="departamento_id" wire:model="departamento_id" class="form-control" required>
                            <option value="">Seleccione un departamento</option>
                            @foreach($departamentos as $departamento)
                                <!-- Usamos el campo correcto para mostrar el nombre del departamento -->
                                <option value="{{ $departamento->id }}">{{ $departamento->descripcion }}</option>
                            @endforeach
                        </select>
                        @error('departamento_id') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <!-- Campo para la descripción del municipio -->
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Municipio</label>
                        <input type="text" id="descripcion" wire:model="descripcion" class="form-control" required>
                        @error('descripcion') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn" data-bs-dismiss="modal" wire:click="closeModal()">Cancelar</button>
                        <button type="submit" class="btn btn-success">{{ $municipio_id ? 'Actualizar' : 'Guardar' }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endif

