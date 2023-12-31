<div>
    <form class="form">
        <div class="card border border-info">
            <div class="card-header">
                <p class="fst-italic fw-bold fs-5 text-info">
                    <i class="fa-regular fa-file-lines"></i>
                    <strong class="text-info">
                        Control
                    </strong>
                </p>
                <hr class="mt-0 mb-0">
            </div>
            <div class="card-body">
                @include('livewire.lineabase.datos_generales.datosgenerales')
            </div>

            <div class="card-header">
                <p class="fst-italic fw-bold fs-5 text-info">
                    <i class="fa-solid fa-code-compare"></i>
                    <strong class="text-info">
                        Composición del Grupo Familiar y Actividades Relacionadas
                    </strong>
                </p>
                <hr class="mt-0 mb-0">
            </div>
            <div class="card-body">
                @foreach ($people as $index => $person)
                <div class="mt-1 mb-1 border border-dark-subtle">
                    <!-- Botón de eliminar en la esquina superior derecha -->
                    <div class="d-flex justify-content-end mr-3 mt-2">
                        <button type="button" class="close text-dark" wire:click.prevent="removePerson({{ $index }})" data-bs-dismiss="alert" aria-label="Close" _mstaria-label="59709">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <!-- Contenido del formulario -->
                    <div class="row mr-1 ml-1">
                        @include('livewire.lineabase.composicion_familiar.header')
                        @if ($person['age'] >= 4 && $person['age'] <= 9) 
                            @include('livewire.lineabase.composicion_familiar.person4') 
                        @elseif ($person['age']>= 10 && $person['age'] <= 17) 
                            @include('livewire.lineabase.composicion_familiar.person10') 
                        @elseif ($person['age']>= 18)
                            @include('livewire.lineabase.composicion_familiar.person18')
                        @endif
                    </div>
                </div>
                @endforeach
                <div class="d-flex justify-content-end mr-3 mt-2">
                    <button class="btn btn-sm btn-secondary round" wire:click.prevent="addPerson">
                        <i class="fa-solid fa-user-plus"></i>
                        Agregar
                    </button>
                </div>
            </div>

            <div class="card-header">
                <p class="fst-italic fw-bold fs-5 text-info">
                    <i class="fa-regular fa-file-lines"></i>
                    <strong class="text-info">
                        Datos Generales
                    </strong>
                </p>
                <hr class="mt-0 mb-0">
            </div>

            <div class="card-footer text-center">
                <hr>
                @if ($selected_id < 1) <button class="btn btn-success round" wire:click.prevent="store">
                    Crear registro
                    </button>
                    @else
                    <button class="btn btn-primary" wire:click.prevent="update">
                        Actualizar cambios
                    </button>
                    <button class="btn btn-danger" type="button" onclick="">
                        Eliminar registro
                    </button>
                    @endif
            </div>
        </div>
    </form>
</div>