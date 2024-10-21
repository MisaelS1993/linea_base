<div class="container mt-5">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Gestor Boleta</h3>
                <p class="text-subtitle text-muted">Aquí encontrarás todas las boletas registradas en las distintas aldeas de cada municipio. Esta plataforma centraliza la información obtenida en encuestas realizadas para identificar las necesidades de cada hogar. </p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Inicio</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Boleta</li>
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
                @include('livewire.boleta.create-Control') <!-- Tu modal aquí -->
                @endif

                <!-- Alert -->
                @if (session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <!-- Botón para abrir el modal -->
                <button type="button" wire:click="create()" class="btn btn-info btn-sm mt-2 mb-2 float-end mr-4" data-bs-toggle="modal" data-bs-target="#boleta">
                    <i data-feather="file-plus"></i>
                    <b>Nueva Boleta</b>
                </button>
            </div>
            <div class="card-body">
                <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">

                    <div class="table-responsive">
                        @if($controls->isEmpty())
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
                                    <th>Fecha y Hora</th>
                                    <th>Entrevistador</th>
                                    <th>Entrevistado</th>
                                    <th>Direccion</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
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
                                        <button wire:click="edit({{ $control->id }})" class="btn text-warning">
                                            <i data-feather="edit"></i>
                                        </button>
                                        <button wire:click="delete({{ $control->id }})" class="btn text-danger">
                                            <i data-feather="trash"></i>
                                        </button>
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