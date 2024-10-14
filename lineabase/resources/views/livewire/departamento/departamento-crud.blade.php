<div class="container mt-5">
    @if($isModalOpen)
    @include('livewire.departamento.create-departamento') <!-- Tu modal aquí -->
    @endif


    <div class="card border-success">
        <div class="card-header bg-success">
            <h3 class="mt-4">Gestor de Departamentos</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <!-- Botón para abrir el modal -->
                    <button type="button" wire:click="create()" class="btn btn-success round float-end mr-2 mb-2 mt-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <div class="spinner-grow spinner-grow-sm" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <b>Nuevo Departamento</b>
                    </button>
                </div>
            </div>

            @if(session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif


            <div class="table-responsive">
                <div class="col-12">
                    <table class="table table-bordered">
                        <thead class="table-success">
                            <tr>
                                <th>ID</th>
                                <th>Descripción</th>
                                <th class="col-2">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($departamentos as $departamento)
                            <tr>
                                <td>{{ $departamento->id }}</td>
                                <td>{{ $departamento->descripcion }}</td>
                                <td class="col-2">
                                    <button wire:click="edit({{ $departamento->id }})" class="btn btn-warning"
                                        style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">EDITAR</button>
                                    <button wire:click="delete({{ $departamento->id }})" class="btn btn-danger"
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