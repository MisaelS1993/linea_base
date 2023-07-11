<div>
    <form class="form">
        @foreach ($people as $index => $person)
            <!-- // Basic multiple Column Form section start -->
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Datos de Persona</h4>
                </div>

                <div class="card-body">
                    
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

                <div class="card-footer text-center">

                    <div class="form-group">
                        <button class="btn btn-danger"
                            wire:click.prevent="removePerson({{ $index }})">Eliminar</button>
                    </div>

                </div>
            </div>
            <!-- // Basic multiple Column Form section end -->
        @endforeach
    </form>
    <div class="text-center">
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
