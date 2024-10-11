<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h3 class="mt-4">Gestor Boleta</h3>
        </div>

        <div class="row">
            <div class="col-12">
                <!-- Botón para abrir el modal -->
                <button type="button" wire:click="create()" class="btn btn-primary btn-sm mt-2 mb-2 float-end mr-2" data-bs-toggle="modal" data-bs-target="#boleta">Nueva Boleta</button>
            </div>
        </div>

        <div class="card-body">

        <!-- Modal para crear/editar aldeas -->
        @if($isModalOpen)
            @include('livewire.boleta.create-Control') <!-- Tu modal aquí -->
        @endif
            @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
            @endif
            <!-- Campo de búsqueda por municipio -->
            <div class="row mb-3 mt-3">
                <div class="col-3 float-end">
                    <input type="text" wire:model="searchTerm" class="form-control" placeholder="Buscar por nombre de municipio">
                </div>
            </div>


            <div class="table-responsive">
                <div class="col-12">
                    <!-- Tabla de municipios -->
                    <table class="table table-primary table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Fecha y Hora</th>
                                <th>Entrevistador</th>
                                <th>Entrevistado</th>
                                <th>Direccion</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($controls as $control)
                            <tr>
                                <td>{{ $control->id }}</td>
                                <td>{{ $control->fecha_hora }}</td>
                                <td>{{ $control->entrevistador }}</td>
                                <td>{{ $control->entrevistado }}</td>
                                <td>{{ $control->aldea->descripcion ?? 'Sin aldea' }}
                                    {{ $control->municipio->descripcion ?? 'Sin municipio' }}
                                    {{ $control->departamento->descripcion ?? 'Sin departamento' }}
                                </td>
                                <td>
                                    <button wire:click="edit({{ $control->id }})" class="btn btn-warning">Editar</button>
                                    <button wire:click="delete({{ $control->id }})" class="btn btn-danger">Eliminar</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
