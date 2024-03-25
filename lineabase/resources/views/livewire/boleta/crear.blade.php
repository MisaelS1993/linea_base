<div class="row">
    <div class="col">
        <div class="container">
            <div class="card border border-info shadow-lg p-3 mb-5 bg-body-tertiary rounded">
                <div class="card-header bg-soft-primary text-center">
                    <p class="h3 text-secondary"><b>Boleta Linea Base</b></p>
                    <p class="h6 text-secondary mb-3"><b>Mancomunidad Consejo Intermunicipal Higuito</b></p>
                    <hr class="bg-secondary">
                </div>

                <form wire:submit.prevent="store">
                    @csrf

                    <!-- inicio de las preguntas -->
                    <div class="card-body">

                        <!-- Inicio del Bloque de preguntas -->
                        <div class="row">

                            <!-- Pregunta Fecha y Hora de Registro -->
                            <div class="form-group col-md-4">
                                <label for="dateTime">Fecha y Hora de Registro:</label>
                                <input type="datetime-local" class="form-control @error('dateTime') is-invalid @enderror" wire:model="dateTime" name="dateTime" id="dateTime" required>
                                @error('dateTime')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <!-- Pregunta Nombre del Entrevistador -->
                            <div class="form-group col-md-4">
                                <label for="interviewer">Nombre del Entrevistador:</label>
                                <input type="text" placeholder="Nombre del Entrevistador" class="form-control @error('interviewer') is-invalid @enderror" wire:model="interviewer" name="interviewer" id="interviewer" required>
                                @error('interviewer')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <!-- Pregunta Nombre del Supervisor -->
                            <div class="form-group col-md-4">
                                <label for "supervisor">Nombre del Supervisor:</label>
                                <input type="text" placeholder="Nombre del Supervisor" class="form-control @error('supervisor') is-invalid @enderror" wire:model="supervisor" name="supervisor" id="supervisor" required>
                                @error('supervisor')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <!-- Pregunta Departamento -->
                            <div class="form-group col-md-4">
                                <label for="department">Departamento:</label>
                                <select class="form-control @error('department') is-invalid @enderror" wire:model="department" name="department" id="department" required>
                                    <option value="">Seleccionar Departamento</option>
                                    <option value="04">Copan</option>
                                    <option value="14">Ocotepeque</option>
                                    <option value="13">Lempiora</option>
                                </select>
                                @error('department')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <!-- Pregunta Municipio -->
                            <div class="form-group col-md-4">
                                <label for="municipality">Municipio:</label>
                                <select class="form-control @error('municipality') is-invalid @enderror" wire:model="municipality" name="municipality" id="municipality" required>
                                    <option value="">Seleccionar Municipio</option>
                                    <option value="03">Concepcion</option>
                                    <option value="01">Santa Rosa</option>
                                    <!-- Agrega más opciones de municipios según tus necesidades -->
                                </select>
                                @error('municipality')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <!-- Pregunta  Observación -->
                            <div class="form-group col-md-4">
                                <label for="observation">Observación:</label>
                                <textarea rows="1" placeholder="Escriba su observacion sobre la boleta" class="form-control @error('observation') is-invalid @enderror" wire:model="observation" name="observation" id="observation" rows="3" required></textarea>
                                @error('observation')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <!-- Pregunta 1.-Nombre del Entrevistado: -->
                            <div class="form-group col-md-4">
                                <label for="interviewee">1.-Nombre del Entrevistado:</label>
                                <input type="text" placeholder="Nombre del Entrevistado" class="form-control @error('interviewee') is-invalid @enderror" wire:model="interviewee" name="interviewee" id="interviewee" required>
                                @error('interviewee')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <!-- Pregunta 2.-Celular -->
                            <div class="form-group col-md-4">
                                <label for="cellphone">2.-Celular:</label>
                                <input type="number" placeholder="000000000" class="form-control @error('cellphone') is-invalid @enderror" data-mask="00000000" wire:model="cellphone" name="cellphone" id="cellphone" required>
                                @error('cellphone')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <!-- Pregunta 3.-Comunidad -->
                            <div class="form-group col-md-4">
                                <label for="community">3.-Comunidad:</label>
                                <input type="text" placeholder="Nombre de la Comunidad" class="form-control @error('community') is-invalid @enderror" wire:model="community" name="community" id="community" required>
                                @error('community')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <!-- Pregunta 4.-Manzanas N° -->
                            <div class="form-group col-md-4">
                                <label for="manzana">4.-Manzanas N°:</label>
                                <input type="number" class="form-control @error('manzana') is-invalid @enderror" wire:model="manzana" name="manzana" id="manzana" required placeholder="Ej. Manzana 123">
                                @error('manzana')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <!-- Pregunta 5.-Lote de Terreno -->
                            <div class="form-group col-md-4">
                                <label for="lot">5.-Lote de Terreno:</label>
                                <input type="number" placeholder="Número de Lote" class="form-control @error('lot') is-invalid @enderror" wire:model="lot" name="lot" id="lot" required>
                                @error('lot')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <!-- Pregunta 6.-N°. ubicación de la vivienda -->
                            <div class="form-group col-md-4">
                                <label for="locationNumber">6.-N°. ubicación de la vivienda:</label>
                                <input type="number" placeholder="Número de Ubicación" class="form-control @error('locationNumber') is-invalid @enderror" wire:model="locationNumber" name="locationNumber" id="locationNumber" required>
                                @error('locationNumber')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <!-- Pregunta 7.-Número de boleta -->
                            <div class="form-group col-md-4">
                                <label for="boletaNumber">7.-Número de boleta:</label>
                                <input type="number" placeholder="Número de Boleta" class="form-control @error('boletaNumber') is-invalid @enderror" wire:model="boletaNumber" name="boletaNumber" id="boletaNumber" required>
                                @error('boletaNumber')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <!-- Pregunta 8.-No. Catastral -->
                            <div class="form-group col-md-4">
                                <label for="catastralNumber">8.-No. Catastral:</label>
                                <input type="text" placeholder="Número Catastral" class="form-control @error('catastralNumber') is-invalid @enderror" wire:model="catastralNumber" name="catastralNumber" id="catastralNumber" required>
                                @error('catastralNumber')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <!-- Pregunta 9.-Total de Edificaciones -->
                            <div class="form-group col-md-4">
                                <label for="totalBuildings">9.-Total de Edificaciones:</label>
                                <input type="number" placeholder="Cantidad de Edificaciones" class="form-control @error('totalBuildings') is-invalid @enderror" wire:model="totalBuildings" name="totalBuildings" id="totalBuildings" required>
                                @error('totalBuildings')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            @if ($totalBuildings >= 1)

                                <!-- Pregunta 10.-Total de Unidades -->
                                <div class="form-group col-md-4">
                                    <label for="totalUnits">10.-Total de Unidades:</label>
                                    <input type="number" placeholder="Cantidad de Unidades" class="form-control @error('totalUnits') is-invalid @enderror" wire:model="totalUnits" name="totalUnits" id="totalUnits" required>
                                    @error('totalUnits')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <!-- Pregunta 11.-Edificacion N° -->
                                <div class="form-group col-md-4">
                                    <label for="buildingNumber">11.-Edificacion N°:</label>
                                    <input type="text" placeholder="Número de Edificación" class="form-control @error('buildingNumber') is-invalid @enderror" wire:model="buildingNumber" name="buildingNumber" id="buildingNumber" required>
                                    @error('buildingNumber')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <!-- Pregunta 12.-Material de las Paredes -->
                                <div class="form-group col-md-4">
                                    <label for="wallMaterial">12.-Material de las Paredes:</label>
                                    <select class="form-control @error('wallMaterial') is-invalid @enderror" wire:model="wallMaterial" name="wallMaterial" id="wallMaterial" required>
                                        <option value="">Seleccione el Material de las Paredes</option>
                                        <option value="1">01. Adobe</option>
                                        <option value="2">02. Bloque</option>
                                        <option value="3">03. Bahareque</option>
                                        <option value="4">04. Madera</option>
                                        <option value="5">05. Desperdicios</option>
                                        <option value="6">06. Ladrillo</option>
                                        <option value="7">07. Yagua</option>
                                        <option value="8">08. Otro</option>
                                        <option value="9">09. No Tiene</option>
                                        <option value="10">10. NS/NR</option>
                                    </select>
                                    @error('wallMaterial')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <!-- Pregunta 13.-Material del Techo -->
                                <div class="form-group col-md-4">
                                    <label for="roofMaterial">13.-Material del Techo:</label>
                                    <select class="form-control @error('roofMaterial') is-invalid @enderror" wire:model="roofMaterial" name="roofMaterial" id="roofMaterial" required>
                                        <option value="">Seleccione el Material del Techo</option>
                                        <option value="1">1. Desechos</option>
                                        <option value="2">2. Paja o similar</option>
                                        <option value="3">3. Teja de barro</option>
                                        <option value="4">4. Lámina metálica</option>
                                        <option value="5">5. Lámina de asbesto</option>
                                        <option value="6">6. Concreto</option>
                                        <option value="7">7. Shingle</option>
                                        <option value="8">8. Otro</option>
                                        <option value="9">9. NS/NR</option>
                                    </select>
                                    @error('roofMaterial')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <!-- Pregunta 14.-Material del Piso -->
                                <div class="form-group col-md-4">
                                    <label for="floorMaterial">14.-Material del Piso:</label>
                                    <select class="form-control @error('floorMaterial') is-invalid @enderror" wire:model="floorMaterial" name="floorMaterial" id="floorMaterial" required>
                                        <option value="">Seleccione el Material del Piso</option>
                                        <option value="1">1. Tierra</option>
                                        <option value="2">2. Plancha cem.</option>
                                        <option value="3">3. Madera rústica</option>
                                        <option value="4">4. Ladrillo de barro</option>
                                        <option value="5">5. Granito</option>
                                        <option value="6">6. Cerámica</option>
                                        <option value="7">7. Mosaico</option>
                                        <option value="8">8. Otro</option>
                                        <option value="9">9. NS/NR</option>
                                    </select>
                                    @error('floorMaterial')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <!-- Pregunta 15.-Principal problema de la edificación -->
                                <div class="form-group col-md-4">
                                    <label for="buildingIssue">15.-Principal problema de la edificación:</label>
                                    <select class="form-control @error('buildingIssue') is-invalid @enderror" wire:model="buildingIssue" name="buildingIssue" id="buildingIssue" required>
                                        <option value="">Seleccione el Principal problema de la edificación</option>
                                        <option value="1">1. Sin repello externo</option>
                                        <option value="2">2. Sin repello interno</option>
                                        <option value="3">3. Sin ambos repellos</option>
                                        <option value="4">4. Piso de tierra</option>
                                        <option value="5">5. Falta de cielo falso</option>
                                        <option value="6">6. Techo en mal estado</option>
                                        <option value="7">7. Otro</option>
                                        <option value="8">8. Ninguno</option>
                                    </select>
                                    @error('buildingIssue')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <!-- Pregunta 16.-Condición de la Edificación -->
                                <div class="form-group col-md-4">
                                    <label for="buildingCondition">16.-Condición de la Edificación:</label>
                                    <select class="form-control @error('buildingCondition') is-invalid @enderror" wire:model="buildingCondition" name="buildingCondition" id="buildingCondition" required>
                                        <option value="">Seleccione la Condición de la Edificación</option>
                                        <option value="1">1. Buena</option>
                                        <option value="2">2. Regular</option>
                                        <option value="3">3. Mala</option>
                                    </select>
                                    @error('buildingCondition')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <!-- Pregunta 17. Unidad No. -->
                                <div class="form-group col-md-4">
                                    <label for="unitNumber">17. Unidad No.:</label>
                                    <input type="number" class="form-control @error('unitNumber') is-invalid @enderror" wire:model="unitNumber" name="unitNumber" id="unitNumber" required>
                                    @error('unitNumber')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <!-- Pregunta 18. Uso Unidad -->
                                <div class="form-group col-md-4">
                                    <label for="unitUsage">18. Uso Unidad:</label>
                                    <input type="text" class="form-control @error('unitUsage') is-invalid @enderror" wire:model="unitUsage" name="unitUsage" id="unitUsage" required placeholder="Ingrese el uso de la unidad">
                                    @error('unitUsage')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <!-- Pregunta 19.-Estado -->
                                <div class="form-group col-md-4">
                                    <label for="unitStatus">19.-Estado:</label>
                                    <select class="form-control @error('unitStatus') is-invalid @enderror" wire:model="unitStatus" name="unitStatus" id="unitStatus" required>
                                        <option value="">Seleccione el Estado</option>
                                        <option value="1">1. Ocupada</option>
                                        <option value="2">2. Desocupada</option>
                                        <option value="3">3. En construcción</option>
                                        <option value="4">4. En ruina/demolida</option>
                                    </select>
                                    @error('unitStatus')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                @if ($unitStatus <= 1) 

                                    <!-- Pregunta 20. Tenencia -->
                                    <div class="form-group col-md-4">
                                        <label for="tenancy">20. Tenencia:</label>
                                        <select class="form-control @error('tenancy') is-invalid @enderror" wire:model="tenancy" name="tenancy" id="tenancy" required>
                                            <option value="">Seleccione la Tenencia</option>
                                            <option value="1">1. Propia dom. pleno</option>
                                            <option value="2">2. Propia dom. util</option>
                                            <option value="3">3. Propia ocupación</option>
                                            <option value="4">4. Propia posesión</option>
                                            <option value="5">5. Pagándola</option>
                                            <option value="6">6. Alquilada</option>
                                            <option value="7">7. Cedida</option>
                                            <option value="8">8. NS/NR</option>
                                        </select>
                                        @error('tenancy')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    @if ($tenancy != 8) 
                                        <!-- Pregunta Sexo: -->
                                        <div class="form-group col-md-4">
                                            <label for="sex">Sexo:</label>
                                            <select class="form-control @error('sex') is-invalid @enderror" wire:model="sex" name="sex" id="sex" required>
                                                <option value="">Seleccione el Sexo</option>
                                                <option value="1">1. Hombre</option>
                                                <option value="2">2. Mujer</option>
                                                <option value="3">3. Ambos</option>
                                            </select>
                                            @error('sex')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    @endif

                                    <!-- Pregunta 21. ¿Tiene cocina? -->
                                    <div class="form-group col-md-6">
                                        <label for="hasKitchen">21. ¿Tiene cocina?</label>
                                        <select class="form-control @error('hasKitchen') is-invalid @enderror" wire:model="hasKitchen" name="hasKitchen" id="hasKitchen" required>
                                            <option value="">Seleccione una opción</option>
                                            <option value="1">1. Si</option>
                                            <option value="2">2. No</option>
                                        </select>
                                        @error('hasKitchen')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <!-- Pregunta 22. ¿Dónde está ubicada? -->
                                    @if ($hasKitchen == 1)
                                        <div class="form-group col-md-6">
                                            <label for="location">22. ¿Dónde está ubicada?</label>
                                            <select class="form-control @error('location') is-invalid @enderror" wire:model="location" name="location" id="location" required>
                                                <option value="">Seleccione la ubicación</option>
                                                <option value="Dentro">1. Dentro</option>
                                                <option value="Fuera">2. Fuera</option>
                                                <option value="Corredor">3. Corredor</option>
                                                <option value="Otro">4. Otro</option>
                                                <option value="NS/NR">5. NS/NR</option>
                                            </select>
                                            @error('location')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    @endif

                                    <!-- Pregunta 23. ¿Qué utilizan para cocinar? -->
                                    <div class="form-group col-md-6">
                                        <label>23. ¿Qué utilizan para cocinar?</label>
                                        <div class="form-check">
                                            <input class="form-check-input form-check-info @error('cookingOptions') is-invalid @enderror" type="checkbox" value="Electricidad" wire:model="cookingOptions" id="electricity">
                                            <label class="form-check-label" for="electricity">1. Electricidad</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input form-check-info @error('cookingOptions') is-invalid @enderror" type="checkbox" value="Gas volátil" wire:model="cookingOptions" id="gasVolatil">
                                            <label class="form-check-label" for="gasVolatil">2. Gas volátil</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input form-check-info @error('cookingOptions') is-invalid @enderror" type="checkbox" value="Gas (kerosén)" wire:model="cookingOptions" id="gasKerosen">
                                            <label class="form-check-label" for="gasKerosen">3. Gas (kerosén)</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input form-check-info @error('cookingOptions') is-invalid @enderror" type="checkbox" value="leña" wire:model="cookingOptions" id="leana">
                                            <label class="form-check-label" for="leana">4. Leña</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input form-check-info @error('cookingOptions') is-invalid @enderror" type="checkbox" value="Eco fogón" wire:model="cookingOptions" id="ecoFogon">
                                            <label class="form-check-label" for="ecoFogon">5. Eco fogón</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input form-check-info @error('cookingOptions') is-invalid @enderror" type="checkbox" value="Ninguno" wire:model="cookingOptions" id="ninguno">
                                            <label class="form-check-label" for="ninguno">6. Ninguno</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input form-check-info @error('cookingOptions') is-invalid @enderror" type="checkbox" value="Otro" wire:model="cookingOptions" id="otro">
                                            <label class="form-check-label" for="otro">7. Otro</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input form-check-info @error('cookingOptions') is-invalid @enderror" type="checkbox" value="NS/NR" wire:model="cookingOptions" id="nsnr">
                                            <label class="form-check-label" for="nsnr">8. NS/NR</label>
                                        </div>
                                        @error('cookingOptions')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <!-- Pregunta 24. ¿Cómo consume el agua?-->
                                    <div class="form-group col-md-6">
                                        <label>24. ¿Cómo consume el agua?</label>
                                        <div class="form-check">
                                            <input class="form-check-input form-check-info @error('waterConsumption') is-invalid @enderror" type="checkbox" value="No tratada" wire:model="waterConsumption" id="noTratada">
                                            <label class="form-check-label" for="noTratada">1. No tratada</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input form-check-info @error('waterConsumption') is-invalid @enderror" type="checkbox" value="Botellón" wire:model="waterConsumption" id="botellon">
                                            <label class="form-check-label" for="botellon">2. Botellón</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input form-check-info @error('waterConsumption') is-invalid @enderror" type="checkbox" value="Filtrada" wire:model="waterConsumption" id="filtrada">
                                            <label class="form-check-label" for="filtrada">3. Filtrada</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input form-check-info @error('waterConsumption') is-invalid @enderror" type="checkbox" value="Hervida" wire:model="waterConsumption" id="hervida">
                                            <label class="form-check-label" for="hervida">4. Hervida</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input form-check-info @error('waterConsumption') is-invalid @enderror" type="checkbox" value="Clorada" wire:model="waterConsumption" id="clorada">
                                            <label class="form-check-label" for="clorada">5. Clorada</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input form-check-info @error('waterConsumption') is-invalid @enderror" type="checkbox" value="Otro" wire:model="waterConsumption" id="otro">
                                            <label class="form-check-label" for="otro">6. Otro</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input form-check-info @error('waterConsumption') is-invalid @enderror" type="checkbox" value="NS/NR" wire:model="waterConsumption" id="nsnr">
                                            <label class="form-check-label" for="nsnr">7. NS/NR</label>
                                        </div>
                                        @error('waterConsumption')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <!-- Pregunta 25.-¿Cuántas piezas tiene esta unidad? -->
                                    <div class="form-group col-md-4">
                                        <label for="unitPieces">25.-¿Cuántas piezas tiene esta unidad?</label>
                                        <input type="number" class="form-control @error('unitPieces') is-invalid @enderror" wire:model="unitPieces" id="unitPieces" name="unitPieces" required>
                                        @error('unitPieces')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <!-- Pregunta 26.¿Cuántos baños tiene esta unidad? -->
                                    <div class="form-group col-md-4">
                                        <label for="unitBathrooms">26.¿Cuántos baños tiene esta unidad?</label>
                                        <input type="number" class="form-control @error('unitBathrooms') is-invalid @enderror" wire:model="unitBathrooms" id="unitBathrooms" name="unitBathrooms" required>
                                        @error('unitBathrooms')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <!-- Pregunta 27. ¿Cuántas piezas son dormitorios? -->
                                    <div class="form-group col-md-4">
                                        <label for="bedroomPieces">27. ¿Cuántas piezas son dormitorios?</label>
                                        <input type="number" class="form-control @error('bedroomPieces') is-invalid @enderror" wire:model="bedroomPieces" id="bedroomPieces" name="bedroomPieces" required>
                                        @error('bedroomPieces')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <!-- Pregunta 28. ¿Cuántas personas por dormitorio? -->
                                    <div class="form-group col-md-4">
                                        <label for="personsPerBedroom">28. ¿Cuántas personas por dormitorio?</label>
                                        <input type="number" class="form-control @error('personsPerBedroom') is-invalid @enderror" wire:model="personsPerBedroom" id="personsPerBedroom" name="personsPerBedroom" required>
                                        @error('personsPerBedroom')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <!-- Pregunta 29. ¿Cuántos hogares hay en esta vivienda? -->
                                    <div class="form-group col-md-4">
                                        <label for="householdsInUnit">29. ¿Cuántos hogares hay en esta vivienda?</label>
                                        <input type="number" class="form-control @error('householdsInUnit') is-invalid @enderror" wire:model="householdsInUnit" id="householdsInUnit" name="householdsInUnit" required>
                                        @error('householdsInUnit')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <!-- Pregunta 30. ¿Cuántos habitantes en la vivienda? -->
                                    <div class="form-group col-md-4">
                                        <label for="residentsInUnit">30. ¿Cuántos habitantes en la vivienda?</label>
                                        <input type="number" class="form-control @error('residentsInUnit') is-invalid @enderror" wire:model="residentsInUnit" id="residentsInUnit" name="residentsInUnit" required>
                                        @error('residentsInUnit')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    
                                    <!-- Pregunta 31. ¿Ha emigrado algún miembro de su vivienda? -->
                                    <div class="form-group col-md-4">
                                        <label for="hasEmigrated">31. ¿Ha emigrado algún miembro de su vivienda?</label>
                                        <select class="form-control @error('hasEmigrated') is-invalid @enderror" wire:model="hasEmigrated" id="hasEmigrated" name="hasEmigrated" required>
                                            <option value="">Seleccione una opción</option>
                                            <option value="si">Sí</option>
                                            <option value="no">No</option>
                                        </select>
                                        @error('hasEmigrated')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    @if ($hasEmigrated === 'si')
                                        <div class="form-group col-md-4">
                                            <label for="emigratedMales">Cantidad de hombres que han emigrado</label>
                                            <input type="number" class="form-control @error('emigratedMales') is-invalid @enderror" wire:model="emigratedMales" id="emigratedMales" name="emigratedMales" required>
                                            @error('emigratedMales')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="emigratedFemales">Cantidad de mujeres que han emigrado</label>
                                            <input type="number" class="form-control @error('emigratedFemales') is-invalid @enderror" wire:model="emigratedFemales" id="emigratedFemales" name="emigratedFemales" required>
                                            @error('emigratedFemales')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>

                                        <!-- Pregunta 32. ¿Dónde han migrado? -->
                                        <div class="row col-md-12 text-center">
                                            <div class="divider">
                                                <div class="divider-text">32. ¿Dónde han migrado y cuántos?</div>
                                            </div>
                                            <div class="col-md-2">
                                                <!-- Etiqueta para "Países de Centro América" -->
                                                <label for="CentralAmerica">Centro América</label>

                                                <!-- Input para "Países de Centro América" con su variable de datos -->
                                                <input type="number" class="form-control @error('CentralAmerica') is-invalid @enderror" wire:model="CentralAmerica" id="CentralAmerica" name="CentralAmerica">

                                                <!-- Mensaje de error para "Países de Centro América" -->
                                                @error('CentralAmerica')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>

                                            <div class="col-md-2">
                                                <!-- Etiqueta para "Norte América" -->
                                                <label for="NorthAmerica">Norte América</label>

                                                <!-- Input para "Norte América" con su variable de datos -->
                                                <input type="number" class="form-control @error('NorthAmerica') is-invalid @enderror" wire:model="NorthAmerica" id="NorthAmerica" name="NorthAmerica">

                                                <!-- Mensaje de error para "Norte América" -->
                                                @error('NorthAmerica')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>

                                            <div class="col-md-2">
                                                <!-- Etiqueta para "Sur América" -->
                                                <label for "SouthAmerica">Sur América</label>

                                                <!-- Input para "Sur América" con su variable de datos -->
                                                <input type="number" class="form-control @error('SouthAmerica') is-invalid @enderror" wire:model="SouthAmerica" id="SouthAmerica" name="SouthAmerica">

                                                <!-- Mensaje de error para "Sur América" -->
                                                @error('SouthAmerica')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>

                                            <div class="col-md-2">
                                                <!-- Etiqueta para "Europa" -->
                                                <label for="Europe">Europa</label>

                                                <!-- Input para "Europa" con su variable de datos -->
                                                <input type="number" class="form-control @error('Europe') is-invalid @enderror" wire:model="Europe" id="Europe" name="Europe">

                                                <!-- Mensaje de error para "Europa" -->
                                                @error('Europe')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>

                                            <div class="col-md-2">
                                                <!-- Etiqueta para "Dentro del País" -->
                                                <label for="WithinCountry">Dentro del País</label>

                                                <!-- Input para "Dentro del País" con su variable de datos -->
                                                <input type="number" class="form-control @error('WithinCountry') is-invalid @enderror" wire:model="WithinCountry" id="WithinCountry" name="WithinCountry">

                                                <!-- Mensaje de error para "Dentro del País" -->
                                                @error('WithinCountry')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>

                                            <div class="col-md-2">
                                                <!-- Etiqueta para "Otro" -->
                                                <label for="Other">Otro</label>

                                                <!-- Input para "Otro" con su variable de datos -->
                                                <input type="number" class="form-control @error('Other') is-invalid @enderror" wire:model="Other" id="Other" name="Other">

                                                <!-- Mensaje de error para "Otro" -->
                                                @error('Other')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>


                                        <!-- Pregunta 33. ¿Razones? -->
                                        <div class="row col-md-12 text-center">
                                            <div class="divider">
                                                <div class="divider-text">33. ¿Razones?</div>
                                            </div>
                                            <div class="col-md-3">
                                                <!-- Etiqueta para "Económicas" -->
                                                <label for="Economic">Económicas</label>

                                                <!-- Input para "Económicas" con su variable de datos -->
                                                <input type="number" class="form-control @error('Economic') is-invalid @enderror" wire:model="Economic" id="Economic" name="Economic">

                                                <!-- Mensaje de error para "Económicas" -->
                                                @error('Economic')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>

                                            <div class="col-md-3">
                                                <!-- Etiqueta para "Violencia generalizada" -->
                                                <label for="GeneralizedViolence">Violencia generalizada</label>

                                                <!-- Input para "Violencia generalizada" con su variable de datos -->
                                                <input type="number" class="form-control @error('GeneralizedViolence') is-invalid @enderror" wire:model="GeneralizedViolence" id="GeneralizedViolence" name="GeneralizedViolence">

                                                <!-- Mensaje de error para "Violencia generalizada" -->
                                                @error('GeneralizedViolence')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>

                                            <div class="col-md-3">
                                                <!-- Etiqueta para "Reunificación familiar" -->
                                                <label for="FamilyReunification">Reunificación familiar</label>

                                                <!-- Input para "Reunificación familiar" con su variable de datos -->
                                                <input type="number" class="form-control @error('FamilyReunification') is-invalid @enderror" wire:model="FamilyReunification" id="FamilyReunification" name="FamilyReunification">

                                                <!-- Mensaje de error para "Reunificación familiar" -->
                                                @error('FamilyReunification')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>

                                            <div class="col-md-3">
                                                <!-- Etiqueta para "Otro" -->
                                                <label for="OtherReason">Otro</label>

                                                <!-- Input para "Otro" con su variable de datos -->
                                                <input type="number" class="form-control @error('OtherReason') is-invalid @enderror" wire:model="OtherReason" id="OtherReason" name="OtherReason">

                                                <!-- Mensaje de error para "Otro" -->
                                                @error('OtherReason')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    @endif

                                    <!-- Pregunta 34. ¿Conoce usted casos de violencia intrafamiliar en su comunidad en el último año? -->
                                    <div class="form-group col-md-4">
                                        <label for="violenceInCommunity">34. ¿Conoce usted casos de violencia intrafamiliar en su comunidad en el último año?</label>
                                        <select class="form-control @error('violenceInCommunity') is-invalid @enderror" wire:model="violenceInCommunity" id="violenceInCommunity" name="violenceInCommunity">
                                            <option value="">Seleccione una opcion</option>
                                            <option value="0">No</option>
                                            <option value="1">Sí</option>
                                        </select>
                                        @error('violenceInCommunity')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    @if ($violenceInCommunity == 1)
                                        <div class=" form-group col-md-4">
                                            <label for="violenceCases">Cantidad de casos</label>
                                            <input type="number" class="form-control @error('violenceCases') is-invalid @enderror" wire:model="violenceCases" id="violenceCases" name="violenceCases">
                                            @error('violenceCases')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    @endif

                                    <!-- Preginta 35. ¿Le ha sucedido algún caso de violencia a Ud. o algún hab. de la vivienda en el último año?-->
                                    <div class="form-group col-md-4">
                                        <label for="violenceToYou">35. ¿Le ha sucedido algún caso de violencia a Ud. o algún hab. de la vivienda en el último año?</label>
                                        <select class="form-control @error('violenceToYou') is-invalid @enderror" wire:model="violenceToYou" id="violenceToYou" name="violenceToYou">
                                            <option value="">Seleccione una opcion</option>
                                            <option value="0">No</option>
                                            <option value="1">Sí</option>
                                        </select>
                                        @error('violenceToYou')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    @if ($violenceToYou == 1)
                                        <div class="form-group col-md-4">
                                            <label for="violenceCasesToYou">Cantidad de casos</label>
                                            <input type="number" class="form-control @error('violenceCasesToYou') is-invalid @enderror" wire:model="violenceCasesToYou" id="violenceCasesToYou" name="violenceCasesToYou">
                                            @error('violenceCasesToYou')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    @endif
                                    
                                    <!-- Pregunta 36. ¿Qué tan seguras, considera Ud. se encuentran las personas que viven en su vivienda en este Barrio o Colonia? -->
                                    <div class="form-group col-md-4">
                                        <label for="securityInNeighborhood">36. ¿Qué tan seguras, considera Ud. se encuentran las personas que viven en su vivienda en este Barrio o Colonia?</label>
                                        <select class="form-control @error('securityInNeighborhood') is-invalid @enderror" wire:model="securityInNeighborhood" id="securityInNeighborhood" name="securityInNeighborhood">
                                            <option value="">Seleccione una opción</option>
                                            <option value="1">Están seguras</option>
                                            <option value="2">No están seguras</option>
                                        </select>
                                        @error('securityInNeighborhood')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <!-- Pregunta 37. ¿Si considera que no están seguras, cual es la razón? -->
                                    @if ($securityInNeighborhood == 2)
                                        <div class="row">
                                            <div class="divider">
                                                <div class="divider-text">37. ¿Si considera que no están seguras, cual es la razón? </div>
                                            </div>
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <label>1. Robo o hurto</label>
                                                    </div>
                                                    <div class="col-md-2 form-group">
                                                        <select class="form-control @error('theft') is-invalid @enderror" wire:model="theft" id="theft" name="theft">
                                                            <option value="">Seleccione una Opcion</option>
                                                            @for ($i = 0; $i <= 5; $i++)
                                                                <option value="{{ $i }}">{{ $i }}</option>
                                                            @endfor
                                                        </select>                                            
                                                        @error('theft')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>

                                                    <div class="col-md-2">
                                                        <label>2. Maras o pandillas</label>
                                                    </div>
                                                    <div class="col-md-2 form-group">
                                                        <select class="form-control @error('gangs') is-invalid @enderror" wire:model="gangs" id="gangs" name="gangs">
                                                            <option value="">Seleccione una Opcion</option>
                                                            @for ($i = 0; $i <= 5; $i++)
                                                                <option value="{{ $i }}">{{ $i }}</option>
                                                            @endfor
                                                        </select>                                            
                                                        @error('gangs')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>

                                                    <div class="col-md-2">
                                                        <label>3. Venta de drogas</label>
                                                    </div>
                                                    <div class="col-md-2 form-group">
                                                        <select class="form-control @error('drugSales') is-invalid @enderror" wire:model="drugSales" id="drugSales" name="drugSales">
                                                            <option value="">Seleccione una Opcion</option>
                                                            @for ($i = 0; $i <= 5; $i++)
                                                                <option value="{{ $i }}">{{ $i }}</option>
                                                            @endfor
                                                        </select>                                            
                                                        @error('drugSales')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>

                                                    <div class="col-md-2">
                                                        <label>4. Cantinas</label>
                                                    </div>
                                                    <div class="col-md-2 form-group">
                                                        <select class="form-control @error('bars') is-invalid @enderror" wire:model="bars" id="bars" name="bars">
                                                            <option value="">Seleccione una Opcion</option>
                                                            @for ($i = 0; $i <= 5; $i++)
                                                                <option value="{{ $i }}">{{ $i }}</option>
                                                            @endfor
                                                        </select>                                            
                                                        @error('bars')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>

                                                    <div class="col-md-2">
                                                        <label>5. Riñas y discusiones</label>
                                                    </div>
                                                    <div class="col-md-2 form-group">
                                                        <select class="form-control @error('fights') is-invalid @enderror" wire:model="fights" id="fights" name="fights">
                                                            <option value="">Seleccione una Opcion</option>
                                                            @for ($i = 0; $i <= 5; $i++)
                                                                <option value="{{ $i }}">{{ $i }}</option>
                                                            @endfor
                                                        </select>                                            
                                                        @error('fights')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>

                                                    <div class="col-md-2">
                                                        <label>6. Violaciones</label>
                                                    </div>
                                                    <div class="col-md-2 form-group">
                                                        <select class="form-control @error('sexualAssaults') is-invalid @enderror" wire:model="sexualAssaults" id="sexualAssaults" name="sexualAssaults">
                                                            <option value="">Seleccione una Opcion</option>
                                                            @for ($i = 0; $i <= 5; $i++)
                                                                <option value="{{ $i }}">{{ $i }}</option>
                                                            @endfor
                                                        </select>                                            
                                                        @error('sexualAssaults')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>

                                                    <div class="col-md-2">
                                                        <label>7. Otros</label>
                                                    </div>
                                                    <div class="col-md-2 form-group">
                                                        <select class="form-control @error('otherCrimes') is-invalid @enderror" wire:model="otherCrimes" id="otherCrimes" name="otherCrimes">
                                                            <option value="">Seleccione una Opcion</option>
                                                            @for ($i = 0; $i <= 5; $i++)
                                                                <option value="{{ $i }}">{{ $i }}</option>
                                                            @endfor
                                                        </select>                                            
                                                        @error('otherCrimes')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    <!-- Pregunta 38. ¿En la vivienda que habita existen los siguientes servicios públicos? -->
                                    <div class="divider">
                                        <div class="divider-text">
                                            38. ¿En la vivienda que habita existen los siguientes servicios públicos?
                                        </div>
                                        <div class="text-center">
                                            @foreach($servicios as $index => $servicio)
                                                <div class="row text-left mb-2 border" wire:key="{{ $index }}">
                                                    <!-- Botón de eliminar en la esquina superior derecha -->
                                                    <div class="d-flex justify-content-end mr-3 mt-2">
                                                        <button type="button" class="close text-dark" wire:click.prevent="eliminarServicio({{ $index }})" data-bs-dismiss="alert" aria-label="Close" _mstaria-label="59709">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>

                                                    <div class="col-md-4 mb-3" >
                                                        <select
                                                        wire:model="servicios.{{ $index }}.nombre"
                                                            class="form-control @error('servicios.$index.nombre') is-invalid @enderror"
                                                            placeholder="Nombre del servicio"
                                                        >
                                                            <option value="">Seleccione un servicio</option>
                                                            <option value="1">1. Agua de pozo propio</option>
                                                            <option value="2">2. Agua domiciliar de pozo comunal</option>
                                                            <option value="3">3. Acarrea agua de río o quebrada</option>
                                                            <option value="4">4. Agua domiciliar por acueducto</option>
                                                            <option value="5">5. Agua llave pública / fuente</option>
                                                            <option value="6">6. Reservorio de agua lluvia</option>
                                                            <option value="7">7. Inodoro con fosa séptica</option>
                                                            <option value="8">8. Inodoro con alcantarillado sanitario</option>
                                                            <option value="9">9. Letrina de fosa simple</option>
                                                            <option value="10">10. Letrina de fosa séptica</option>
                                                            <option value="11">11. Usa la letrina</option>
                                                            <option value="12">12. Recolección de basura</option>
                                                            <option value="13">13. Aseo de calles</option>
                                                            <option value="14">14. Energía eléctrica domiciliar</option>
                                                            <option value="15">15. Teléfono (Hondutel)</option>
                                                            <option value="16">16. Teléfono (Celular móvil o fijo)</option>
                                                            <option value="17">17. Alumbrado público</option>
                                                            <option value="18">18. Mantenimiento de calles</option>
                                                        </select>
                                                        @error("servicios.$index.nombre") <span class="error text-danger">{{ $message }}</span> @enderror
                                                    </div>

                                                    @if(!in_array($servicio['nombre'], [3, 11, 12, 13, 15, 16]))
                                                        <div class="col-md-4" >
                                                            <select
                                                                wire:model="servicios.{{ $index }}.estado"
                                                                class="form-control @error('servicios.$index.estado') is-invalid @enderror"
                                                                placeholder="Estado que lo recibe"
                                                            >
                                                                <option value="">Estado que lo recibe</option>
                                                                <option value="1">1. Bueno</option>
                                                                <option value="2">2. Regular</option>
                                                                <option value="3">3. Malo</option>
                                                                <!-- Agrega más opciones según tus necesidades -->
                                                            </select>
                                                            @error("servicios.$index.estado") <span class="error text-danger">{{ $message }}</span> @enderror
                                                        </div>
                                                    @endif

                                                    @if(!in_array($servicio['nombre'], [7, 8, 9, 10, 11, 14, 15, 16, 17, 18]))
                                                        <div class="col-md-4" >
                                                            <select
                                                                wire:model="servicios.{{ $index }}.dias"
                                                                class="form-control @error('servicios.$index.dias') is-invalid @enderror"
                                                                placeholder="Estado que lo recibe"
                                                            >
                                                                <option value="">Días que lo recibe</option>
                                                                <option value="Lunes">Lunes</option>
                                                                <option value="Martes">Martes</option>
                                                                <option value="Miércoles">Miércoles</option>
                                                                <option value="Jueves">Jueves</option>
                                                                <option value="Viernes">Viernes</option>
                                                                <option value="Sábado">Sábado</option>
                                                                <option value="Domingo">Domingo</option>
                                                                <option value="Todoslosdias">Todos los días</option>
                                                                <!-- Agrega más opciones según tus necesidades -->
                                                            </select>
                                                            @error("servicios.$index.dias") <span class="error text-danger">{{ $message }}</span> @enderror
                                                        </div>
                                                    @endif
                                                </div>
                                            @endforeach
                                            <button class="btn btn-outline-info btn-sm" wire:click.prevent="agregarServicio"><i class="fa-solid fa-sort-down"></i></button>
                                        </div>
                                    </div>
                                    

                                   

















                                @endif  
                                
                                
                            @else
                                <div class="form-group col-md-4">
                                    <label for="unitUsage">18. Uso Unidad:</label>
                                    <input type="text" class="form-control @error('unitUsage') is-invalid @enderror" wire:model="unitUsage" name="unitUsage" id="unitUsage" required placeholder="Ingrese el uso de la unidad">
                                    @error('unitUsage')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            @endif
                    </div>
                    <!-- final del Bloque de preguntas -->


            </div>
            <!-- Final de las preguntas -->

            <div class="card-footer  bg-soft-primary text-center">
                <hr class="bg-secondary">
                @if ($selected_id < 1) <button class="btn btn-success round" wire:click.prevent="store">
                    Crear registro
                    </button>
                    @else
                    <button class="btn btn-primary" wire:click.prevent="update">
                        Actualizar cambios
                    </button>
                    <button class="btn btn-danger" type="button" onclick="">
                        Eliminar registro
                    </button>
                    @endif
            </div>

            </form>
        </div>
    </div>
</div>
</div>