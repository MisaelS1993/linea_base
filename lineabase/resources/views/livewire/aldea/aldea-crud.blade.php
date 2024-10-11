<div class="container mt-5">
    <!-- Modal para crear/editar aldeas -->
    @if($isModalOpen)
        @include('livewire.aldea.create-aldea') <!-- Tu modal aquí -->
    @endif

    <div class="card">
        <div class="card-header">
            <h3 class="mt-4">Gestor de Aldeas</h3>
        </div>

            <div class="row">
                <div class="col-12">
                    <!-- Botón para abrir el modal -->
                    <button type="button" wire:click="create()" class="btn btn-primary btn-sm mt-2 mb-2 float-end mr-2" data-bs-toggle="modal" data-bs-target="#exampleModal">Nueva Aldea</button>
                </div>
            </div>

        <div class="card-body">
            <!-- Mensaje de éxito -->
            @if(session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Campo de búsqueda por aldea -->
            <div class="row mb-3">
                <div class="col-3 float-end">
                    <input type="text" wire:model="searchTerm" class="form-control" placeholder="Buscar por nombre de aldea o municipio">
                </div>
            </div>

            <div class="table-responsive">
                <div class="col-12">
                    <!-- Tabla de aldeas -->
                    <table class="table table-primary table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Descripción</th>
                                <th>Municipio</th>
                                <th class="col-2">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($aldeas as $aldea)
                                <tr>
                                    <td>{{ $aldea->id }}</td>
                                    <td>{{ $aldea->descripcion }}</td>
                                    <!-- Mostramos el nombre del municipio al que pertenece la aldea -->
                                    <td>{{ $aldea->municipio->descripcion }}</td>
                                    <td class="col-2">
                                        <!-- Botones para editar y borrar -->
                                        <button wire:click="edit({{ $aldea->id }})" class="btn btn-warning"
                                            style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">EDITAR</button>
                                        <button wire:click="delete({{ $aldea->id }})" class="btn btn-danger"
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
