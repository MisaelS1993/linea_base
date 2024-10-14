<div class="container">
    <div class="card border border-success">
        <div class="card-header bg-success">
            <h3 class="mt-4">Gestor Boleta</h3>
        </div>

        <div class="row">
            <div class="col-12">


                <!-- Botón para abrir el modal -->
                <button type="button" wire:click="create()" class="btn btn-success btn-bordered mt-2 mb-2 float-end mr-2 round" data-bs-toggle="modal" data-bs-target="#boleta">
                    <div class="spinner-grow spinner-grow-sm" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <b>Nueva Boleta</b>
                </button>
            </div>
        </div>

        <div class="card-body">

            <!-- Modal para crear/editar aldeas -->
            @if($isModalOpen)
            @include('livewire.boleta.create-Control') <!-- Tu modal aquí -->
            @endif
            @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
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
                    <table class="table table-bordered">
                        <thead class="table-success">
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
                                <td>{{ $control->aldea->descripcion ?? 'Sin aldea' }},
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

        <div class="footer">
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center pagination-success">

                    <li class="page-item">
                        <a class="page-link" href="#">
                            <span aria-hidden="true">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left">
                                    <polyline points="15 18 9 12 15 6"></polyline>
                                </svg>
                            </span>
                        </a>
                    </li>

                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item "><a class="page-link" href="#">2</a></li>
                    <li class="page-item active"><a class="page-link" href="#">3</a></li>

                    <li class="page-item">
                        <a class="page-link" href="#">
                            <span aria-hidden="true">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                                    <polyline points="9 18 15 12 9 6"></polyline>
                                </svg>
                            </span>
                        </a>
                    </li>

                </ul>
            </nav>
        </div>
    </div>
</div>