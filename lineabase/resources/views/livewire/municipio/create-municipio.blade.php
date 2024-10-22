<!-- Modal -->
<section id="modal">
    <div wire:ignore.self class="modal fade" id="myModal" data-bs-backdrop="static" data-bs-keyboard="false" style="display: block;" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered"
            role="document">
            <div class="modal-content">
                <div class="modal-header btn-success">
                    <h1 class="modal-title white" id="exampleModalLabel">{{ $municipio_id ? 'Editar Municipio' : 'Crear Nuevo Municipio' }}</h1>

                    <button type="button" class="close dark" wire:click="closeModal()" data-bs-dismiss="modal" aria-label="Close">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                </div>
                <form wire:submit.prevent="store">
                    <div class="modal-body">

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

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn" data-bs-dismiss="modal" wire:click="closeModal()">Cancelar</button>
                        <button type="submit" class="btn btn-success">{{ $municipio_id ? 'Actualizar' : 'Guardar' }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>


