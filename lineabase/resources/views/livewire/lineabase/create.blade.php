<div>
    <form class="form">
        
            <!-- // Basic multiple Column Form section start -->
            <div class="card border border-dark-subtle">
                <div class="card-header">
                    <h4 class="card-title">Datos de Persona</h4>
                    <hr>
                </div>
                @foreach ($people as $index => $person)
                
                    <div class="card-body ">
                        <div class="card">
                            <div class="card-body shadow-sm p-3 border border-secondary-subtle">
                                <!-- Botón de eliminar en la esquina superior derecha -->
                                <div class="d-flex justify-content-end">
                                    <button type="button" class="close text-danger" wire:click.prevent="removePerson({{ $index }})" data-bs-dismiss="alert" aria-label="Close" _mstaria-label="59709">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <!-- Contenido del formulario -->
                                <div class="row">

                                    @include('livewire.lineabase.composicion_familiar.header')

                                    @if ($person['age'] >= 4 && $person['age'] <= 9)
                                        @include('livewire.lineabase.composicion_familiar.person4')
                                    @elseif ($person['age'] >= 10 && $person['age'] <= 17)
                                        @include('livewire.lineabase.composicion_familiar.person10')
                                    @elseif ($person['age'] >= 18)
                                        @include('livewire.lineabase.composicion_familiar.person18')
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="card-footer text-center">
                    <hr>
                    <button class="btn btn-sm shadow-lg p-3 btn-primary round" wire:click.prevent="addPerson">Agregar Persona</button>
                    @if ($selected_id < 1)
                        <button class="btn btn-success round" wire:click.prevent="store">
                            Crear registro
                        </button>
            
                    @else
                        <button class="btn btn-primary" wire:click.prevent="update">
                            Actualizar cambios
                        </button>
                        <button class="btn btn-danger" type="button" onclick="')">
                            Eliminar registro
                        </button>
                    @endif
                </div>
            </div>
            <!-- // Basic multiple Column Form section end -->
        
    
    
    </form>
</div>
