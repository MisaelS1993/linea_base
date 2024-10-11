<!-- Modal -->
@if($isModalOpen)
<div class="modal fade text-left show" data-bs-backdrop="static" data-bs-keyboard="false" style="display: block;" tabindex="-1" aria-labelledby="boleta" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen"> <!-- Centrado -->
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $control_id ? 'Editar Boleta' : 'Crear Nueva Boleta' }}</h1>
                <button type="button" class="btn-close" wire:click="closeModal()" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" wire:click="closeModal()">Cancelar</button>
                <button type="submit" class="btn btn-primary">{{ $control_id ? 'Actualizar' : 'Guardar' }}</button>
            </div>
        </div>
    </div>
</div>
@endif