<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Gestor de Departamentos</h3>
                <p class="text-subtitle text-muted">Aquí podrás gestionar todos los departamentos. ¡Explora y administra los departamentos de manera fácil y eficiente!</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Inicio</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Departamentos</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <!-- Modal para crear/editar aldeas -->
                @if($isModalOpen)
                @include('livewire.departamento.create-departamento') <!-- Tu modal aquí -->
                @endif

                <!-- Alert -->
                @if (session()->has('message'))
                <div class="alert alert-success alert-dismissible show fade">
                    {{ session('message') }}
                    <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                @endif
                <div class="row">
                    <div class="col-md-9">
                        <!-- Botón para abrir el modal -->
                        <button type="button" wire:click="create()" class="btn btn-success btn-sm mr-2 mb-2 mt-2" data-bs-toggle="modal" data-bs-target="#myModal">
                            <i data-feather="file-plus"></i>
                            <b>Agregar</b>
                        </button>
                    </div>
                    <div class="col-md-3">
                        <div class="d-flex justify-content-end mt-4">
                            <div class="input-group">
                                <input type="text" wire:model="search" class="form-control" placeholder="Buscar registros...">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">

                    <div class="table-responsive">
                        @if($departamentos && $departamentos->count() >= 1)
                        <!-- Tabla de boletas -->
                        <table class="table dataTable-table table-sm text-center" id="table1">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Descripción</th>
                                    <th class="col-4">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($departamentos as $departamento)
                                <tr>
                                    <td>{{ $departamento->id }}</td>
                                    <td>{{ $departamento->descripcion }}</td>
                                    <td>
                                        <button wire:click="edit({{ $departamento->id }})" class="btn text-warning btn-sm"><i data-feather="edit"></i>Editar</button>
                                        <button wire:click="delete({{ $departamento->id }})" class="btn text-danger btn-sm"><i data-feather="trash"></i>Borrar</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- Controlar el número de entradas por página -->
                        {{ $departamentos->links('pagination::bootstrap-5') }}


                        @else
                        <p>
                        <h4 class="text-center">
                            <i class="text-danger" data-feather="alert-triangle"></i>
                            ¡No hay ningun registro!
                        </h4>
                        </p>
                        @endif


                    </div>
                </div>
            </div>
        </div>

    </section>

</div>