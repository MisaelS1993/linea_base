<div class="container mt-5">
    <!-- Modal para crear/editar municipios -->
    @if($isModalOpen)
    @include('livewire.municipio.create-municipio') <!-- Tu modal aquí -->
    @endif

    <div class="card border-success">
        <div class="card-header bg-success">
            <h3 class="mt-4">Gestor de Municipios</h3>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <!-- Botón para abrir el modal -->
                    <button type="button" wire:click="create()" class="btn btn-success round mt-2 mb-2 float-end mr-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <div class="spinner-grow spinner-grow-sm" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <b>Nuevo Municipio</b>
                    </button>
                </div>
            </div>
            <!-- Mensaje de éxito -->
            @if(session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

             <!-- Campo de búsqueda por municipio -->
             <div class="row mb-3">
                <div class="col-3 float-end">
                    <input type="text" wire:model="searchTerm" class="form-control" placeholder="Buscar por nombre de municipio">
                </div>
            </div>


            <div class="table-responsive">
                <div class="col-12">
                    <!-- Tabla de municipios -->
                    <table class="table table-bordered">
                        <thead class="table-success">
                            <tr>
                                <th>ID</th>
                                <th>Descripción</th>
                                <th>Departamento</th>
                                <th class="col-2">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($municipios as $municipio)
                            <tr>
                                <td>{{ $municipio->id }}</td>
                                <td>{{ $municipio->descripcion }}</td>
                                <!-- Cambiamos a $municipio->departamento->descripcion para mostrar el nombre del departamento -->
                                <td>{{ $municipio->departamento->descripcion }}</td>
                                <td class="col-2">
                                    <!-- Botones para editar y borrar -->
                                    <button wire:click="edit({{ $municipio->id }})" class="btn btn-warning"
                                        style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">EDITAR</button>
                                    <button wire:click="delete({{ $municipio->id }})" class="btn btn-danger"
                                        style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">BORRAR</button>
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