<!-- Modal -->
@if($isModalOpen)
<div class="modal fade show" id="boleta" tabindex="-1" aria-labelledby="boleta" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered"> <!-- Agregamos modal-dialog-centered aquí -->
        <div class="modal-content bg-success-subtle border border-success shadow-lg p-3 mb-5">
            <div class="modal-header bg-success text-light">
                <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $departamento_id ? 'Editar Departamento' : 'Crear Nuevo Departamento' }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal()" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="store">
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <input type="text" id="descripcion" wire:model="descripcion" class="form-control" required>
                        @error('descripcion') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" wire:click="closeModal()">Cancelar</button>
                        <button type="submit" class="btn btn-success">{{ $departamento_id ? 'Actualizar' : 'Guardar' }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endif

