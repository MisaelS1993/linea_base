<!-- Modal -->
@if($isModalOpen)
<div class="modal fade text-left show" data-bs-backdrop="static" data-bs-keyboard="false" style="display: block;" tabindex="-1" aria-labelledby="boleta" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-scrollable"> <!-- Centrado -->
        <div class="modal-content bg-success-subtle border border-secondary">

            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $control_id ? 'Editar Boleta' : 'Crear Nueva Boleta' }}</h1>
                <button type="button" class="btn-close" wire:click="closeModal()" aria-label="Close"></button>
            </div>

            <form wire:submit.prevent="store">
                @csrf
                <div class="modal-body">
                    <!-- Inicio del Bloque de preguntas -->
                    <div class="row">

                        <!-- Pregunta Fecha y Hora de Registro -->
                        <div class="form-group col-md-4">
                            <label for="fecha_hora">Fecha y Hora de Registro:</label>
                            <input type="datetime-local" class="form-control @error('fecha_hora') is-invalid @enderror" aria-describedby="fecha_hora" wire:model="fecha_hora" name="fecha_hora" id="fecha_hora">
                            @error('fecha_hora')
                            <div id="fecha_hora" class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <!-- Pregunta Nombre del Entrevistador -->
                        <div class="form-group col-md-4">
                            <label for="interviewer">Nombre del Entrevistador:</label>
                            <input type="text" placeholder="Nombre del Entrevistador" class="form-control @error('entrevistador') is-invalid @enderror" wire:model="entrevistador" value="entrevistador" name="entrevistador"  id="entrevistador" readonly>
                            @error('entrevistador')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <!-- Pregunta Nombre del Supervisor -->
                        <div class="form-group col-md-4">
                            <label for="supervisor">Nombre del Supervisor:</label>
                            <input type="text" placeholder="Nombre del Supervisor" class="form-control @error('supervisor') is-invalid @enderror" wire:model="supervisor" name="supervisor" id="supervisor">
                            @error('supervisor')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <!-- Pregunta Nombre del Entrevistado -->
                        <div class="form-group col-md-4">
                            <label for="entrevistado">Nombre del Entrevistado:</label>
                            <input type="text" placeholder="Nombre del Entrevistado" class="form-control @error('entrevistado') is-invalid @enderror" wire:model="entrevistado" name="entrevistado" id="entrevistado">
                            @error('entrevistado')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>


                        <!-- Selección del departamento al que pertenece el municipio -->
                        <div class="form-group col-md-4">
                            <label for="id_departamento">Departamento:</label>
                            <select class="form-control @error('id_departamento') is-invalid @enderror" wire:model="id_departamento" name="id_departamento" id="id_departamento">
                                <option value="">Seleccionar Departamento</option>
                                @foreach($departamentos as $departamento)
                                <option value="{{ $departamento->id }}">{{ $departamento->descripcion }}</option>
                                @endforeach
                            </select>
                            @error('id_departamento')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <!-- Pregunta Municipio -->
                        <div class="form-group col-md-4">
                            <label for="id_municipio">Municipio:</label>
                            <select class="form-control @error('id_municipio') is-invalid @enderror" wire:model="id_municipio" name="id_municipio" id="id_municipio">
                                <option value="">Seleccionar Municipio</option>
                                @if (!empty($municipios))
                                @foreach($municipios as $municipio)
                                <option value="{{ $municipio->id }}">{{ $municipio->descripcion }}</option>
                                @endforeach
                                @else
                                <option value="">No hay municipios disponibles</option>
                                @endif
                            </select>
                            @error('id_municipio')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <!-- Select de Aldea -->
                        <div class="form-group col-md-4">
                            <label for="id_aldeas">Aldea:</label>
                            <select class="form-control @error('id_aldeas') is-invalid @enderror" wire:model="id_aldeas" name="id_aldeas" id="id_aldeas">
                                <option value="">Seleccionar Aldea</option>
                                @if (!empty($aldeas))
                                @foreach($aldeas as $aldea)
                                <option value="{{ $aldea->id }}">{{ $aldea->descripcion }}</option>
                                @endforeach
                                @else
                                <option value="">No hay aldeas disponibles</option>
                                @endif
                            </select>
                            @error('id_aldeas')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                         <!-- Pregunta Observación -->
                         <div class="form-group col-md-4">
                            <label for="observacion">Observación:</label>
                            <textarea rows="1" placeholder="Escriba su observación sobre la boleta" class="form-control @error('observacion') is-invalid @enderror" wire:model="observacion" name="observacion" id="observacion" rows="3" ></textarea>
                            @error('observacion')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                         <!-- Pregunta Teléfono -->
                         <div class="form-group col-md-4">
                            <label for="telefono">Teléfono:</label>
                            <input type="number" placeholder="00000000" class="form-control @error('telefono') is-invalid @enderror" wire:model="telefono" name="telefono" id="telefono">
                            @error('telefono')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <!-- Pregunta Manzana N° -->
                        <div class="form-group col-md-4">
                            <label for="no_manzana">Manzana N°:</label>
                            <input type="number" class="form-control @error('no_manzana') is-invalid @enderror" wire:model="no_manzana" name="no_manzana" id="no_manzana"  placeholder="Ej. Manzana 123">
                            @error('no_manzana')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                         <!-- Pregunta Lote N° -->
                         <div class="form-group col-md-4">
                            <label for="no_lote">Lote N°:</label>
                            <input type="number" class="form-control @error('no_lote') is-invalid @enderror" wire:model="no_lote" name="no_lote" id="no_lote" placeholder="Ej. Lote 456">
                            @error('no_lote')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <!-- Pregunta Número de ubicación de la vivienda -->
                        <div class="form-group col-md-4">
                            <label for="ubicacion_vivienda">Número de Ubicación de la Vivienda:</label>
                            <input type="text" placeholder="Ubicación de la vivienda" class="form-control @error('ubicacion_vivienda') is-invalid @enderror" wire:model="ubicacion_vivienda" name="ubicacion_vivienda" id="ubicacion_vivienda">
                            @error('ubicacion_vivienda')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <!-- Pregunta Número Catastral -->
                        <div class="form-group col-md-4">
                            <label for="no_catastral">Número Catastral:</label>
                            <input type="text" placeholder="Número Catastral" class="form-control @error('no_catastral') is-invalid @enderror" wire:model="no_catastral" name="no_catastral" id="no_catastral">
                            @error('no_catastral')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        

                    </div>

                </div>

                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal()">Cancelar</button>
                    <button type="submit" class="btn btn-primary">{{ $control_id ? 'Actualizar' : 'Guardar' }}</button>
                </div>

            </form>
        </div>
    </div>
</div>
@endif