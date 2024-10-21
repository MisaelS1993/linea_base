<div class="container mt-5">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Gestor Departamento</h3>
                <p class="text-subtitle text-muted">Aquí encontrarás todos los departamento de nuestro pais registrados.</p>
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
                <!-- Botón para abrir el modal -->
                <button type="button" wire:click="create()" class="btn btn-success btn-sm mr-2 mb-2 mt-2" data-bs-toggle="modal" data-bs-target="#myModal">
                    <i data-feather="file-plus"></i>
                    <b>Nuevo Departamento</b>
                </button>
            </div>
            <div class="card-body">
                <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">

                    <div class="table-responsive">
                        @if($departamentos->isEmpty())
                        <p>
                        <h4 class="text-center">
                            <i class="text-danger" data-feather="alert-triangle"></i>
                            ¡No hay ningun registro!
                        </h4>
                        </p>
                        @else
                        <!-- Tabla de boletas -->
                        <table class="table dataTable-table table-sm" id="table1">
                            <thead class="text-center">
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
                                        <button wire:click="edit({{ $departamento->id }})" class="btn text-warning"><i data-feather="edit"></i></button>
                                        <button wire:click="delete({{ $departamento->id }})" class="btn text-danger"><i data-feather="trash"></i></button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-footer">
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

                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item "><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>

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

    </section>
</div>