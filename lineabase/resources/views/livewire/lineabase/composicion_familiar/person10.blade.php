<div class="col-md-6 col-12">
    <div class="form-group">
        <label for="read_write">Sabe Leer y Escribir</label>
        <select class="form-control @error('people.' . $index . '.read_write') is-invalid @enderror" id="respuesta" 
        wire:model="people.{{ $index }}.read_write" required>
            <option value="">Seleccione...</option>
            <option value="1">1.-Sí</option>
            <option value="2">2.-No</option>
            <option value="3">3.-NS/NR</option>
        </select>
        @error('people.' . $index . '.read_write')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>

<div class="col-md-6 col-12">
    <div class="form-group">
        <label for="study_now">Estudia Ahora</label>
        <select class="form-control @error('people.' . $index . '.study_now') is-invalid @enderror" id="respuesta" 
        wire:model="people.{{ $index }}.study_now" required>
            <option value="">Seleccione...</option>
            <option value="1">1.-Sí</option>
            <option value="2">2.-No</option>
            <option value="3">3.-NS/NR</option>
        </select>
        @error('people.' . $index . '.study_now')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>

<div class="col-md-6 col-12">
    <div class="form-group">
        <label for="year_course">Año que Actualmente Cursa</label>
        <select class="form-control @error('people.' . $index . '.year_course') is-invalid @enderror" id="respuesta" 
        wire:model="people.{{ $index }}.year_course" required>
        <option value="">Seleccione...</option>
        <option value="1">1.-Pre-escolar</option>
        <option value="2">2.-Grado 1</option>
        <option value="3">3.-Grado 2</option>
        <option value="4">4.-Grado 3</option>
        <option value="5">5.-Grado 4</option>
        <option value="6">6.-Grado 5</option>
        <option value="7">7.-Grado 6</option>
        <option value="8">8.-Grado 7</option>
        <option value="9">9.-Grado 8</option>
        <option value="10">10.-Grado 9</option>
        <option value="11">11.-Diversificado</option>
        <option value="12">12.-Universitario</option>
        <option value="13">13.-Ninguno</option>
        </select>
        @error('people.' . $index . '.year_course')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>

<div class="col-md-6 col-12">
    <div class="form-group">
        <label for="total_year">Total Años de Estudio</label>
        <input type="number" id="total_year"
            class="form-control @error('people.' . $index . '.total_year') is-invalid @enderror"
            wire:model="people.{{ $index }}.total_year" placeholder="Edad" required>
        @error('people.' . $index . '.total_year')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>

<div class="col-md-6 col-12">
    <div class="form-group">
        <label for="civil_status">Estado Civil</label>
        <select class="form-control @error('people.' . $index . '.civil_status') is-invalid @enderror" id="civil_status"
            wire:model="people.{{ $index }}.civil_status" required>
            <option value="">Seleccione...</option>
            <option value="1">1.-Soltero/a</option>
            <option value="2">2.-Casado/a</option>
            <option value="3">3.-Divorciado/a</option>
            <option value="4">4.-Unión libre</option>
            <option value="5">5.-Viudo/a</option>
            <option value="6">6.-NS/NR</option>
        </select>
        @error('people.' . $index . '.civil_status')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>

<div class="col-md-6 col-12">
    <div class="form-group">
        <label for="job">Trabaja</label>
        <select class="form-control @error('people.' . $index . '.job') is-invalid @enderror" id="job"
            wire:model="people.{{ $index }}.job" required>
            <option value="">Seleccione...</option>
            <option value="1">Sí</option>
            <option value="2">No</option>
            <option value="3">NS/NR</option>
        </select>
        @error('people.' . $index . '.job')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>

@if($people[$index]['job'] === '1') 
    <div class="col-md-6 col-12">
        <div class="form-group">
            <label for="occupation">Ocupacion Actual</label>
            <input type="text" id="occupation"
                class="form-control  @error('people.' . $index . '.occupation') is-invalid @enderror"
                wire:model="people.{{ $index }}.occupation" placeholder="Ocupación Actual" required>
            @error('people.' . $index . '.occupation')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
@endif

<div class="col-md-6 col-12">
    <div class="form-group">
        <label for="profession_trade">Profesión u Oficio</label>
        <input type="text" id="profession_trade"
            class="form-control  @error('people.' . $index . '.profession_trade') is-invalid @enderror"
            wire:model="people.{{ $index }}.profession_trade" placeholder="Profesión u Oficio" required>
        @error('people.' . $index . '.profession_trade')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>

<div class="col-md-6 col-12">
    <div class="form-group">
        <label for="monthly_income">Ingreso Mensual</label>
        <input type="number" id="monthly_income"
            class="form-control  @error('people.' . $index . '.monthly_income') is-invalid @enderror"
            wire:model="people.{{ $index }}.monthly_income" placeholder="Ingreso Mensual" required>
        @error('people.' . $index . '.monthly_income')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>

<div class="col-md-6 col-12">
    <div class="form-group">
        <label for="activity">Que actividad económica realiza </label>
        <select class="form-control @error('people.' . $index . '.activity') is-invalid @enderror" id="activity"
            wire:model="people.{{ $index }}.activity" required>
            <option value="">Seleccionar ocupación</option>
          <option value="1">1.-Trabajo propio</option>
          <option value="2">2.-Trabajo asalariado</option>
          <option value="3">3.-Busca trabajo</option>
          <option value="4">4.-Trabajo doméstico exclusivo</option>
          <option value="5">5.-Trabajo doméstico y otra actividad económica</option>
          <option value="6">6.-Jubilado/Pensionado</option>
          <option value="7">7.-Estudia exclusivamente</option>
          <option value="8">8.-Incapacitado</option>
          <option value="9">9.-Otros</option>
        </select>
        @error('people.' . $index . '.activity')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>



@if($people[$index]['activity'] === '2'|| $people[$index]['activity'] === '4' || $people[$index]['activity'] === '5')    
    <div class="col-md-6 col-12">
        <div class="form-group">
            <label for="sector">En que sector esta contratado</label>
            <select class="form-control @error('people.' . $index . '.sector') is-invalid @enderror" id="sector"
                wire:model="people.{{ $index }}.sector" required>
                <option value="">Seleccione...</option>
                <option value="1">1.-Comercial</option>
                <option value="2">2.-Industrial</option>
                <option value="3">3.-Servicio</option>
                <option value="4">4.-NS/NR</option>
            </select>
            @error('people.' . $index . '.sector')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
@endif

@if($people[$index]['activity'] === '1')
    <div class="col-md-6 col-12">
        <div class="form-group">
            <label for="dedicated_sector">A que sector se dedica</label>
            <select class="form-control @error('people.' . $index . '.dedicated_sector') is-invalid @enderror" id="dedicated_sector"
                wire:model="people.{{ $index }}.dedicated_sector" required>
                <option value="">Seleccione...</option>
                <option value="1">1.-Primario</option>
                <option value="2">2.-Secundario</option>
                <option value="3">3.-Terciario</option>
                <option value="4">4.-NS/NR</option>
            </select>
            @error('people.' . $index . '.dedicated_sector')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>

    <div class="col-md-6 col-12">
        <div class="form-group">
            <label for="employment_sector">Cuanto empleo genera al sector al que se dedica</label>
            <select class="form-control @error('people.' . $index . '.employment_sector') is-invalid @enderror" id="employment_sector"
                wire:model="people.{{ $index }}.employment_sector" required>
                <option value="">Seleccione...</option>
                <option value="1">1.- 0</option>
                <option value="2">1.- 1 a 5</option>
                <option value="3">1.- 6 a 10</option>
                <option value="4">1.- 11 a 15</option>
                <option value="5">1.- 16 a 20</option>
                <option value="6">1.- 21 en adelante</option>
                <option value="7">1.- NS/NR</option>
            </select>
            @error('people.' . $index . '.employment_sector')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>

    <div class="col-md-6 col-12">
        <div class="form-group">
            <label for="organization">Organización de la que sea miembro</label>
            <select class="form-control @error('people.' . $index . '.organization') is-invalid @enderror" id="organization"
                wire:model="people.{{ $index }}.organization" required>
                <option value="">Seleccione...</option>
                <option value="9">Ninguna</option>
            </select>
            @error('people.' . $index . '.organization')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>

    <div class="col-md-6 col-12">
        <div class="form-group">
            <label for="institutions">Que instituciones han apoyado al sector productivo al cual usted pertenece</label>
            <input type="text" id="institutions"
                class="form-control  @error('people.' . $index . '.institutions') is-invalid @enderror"
                wire:model="people.{{ $index }}.institutions" placeholder="Nombre" required>
            @error('people.' . $index . '.institutions')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
@endif


<div class="col-md-6 col-12">
    <div class="form-group">
        <label for="Community_organization">Quien en la vivienda participa en organizaciones de la comunidad</label>
        <select class="form-control @error('people.' . $index . '.Community_organization') is-invalid @enderror" id="Community_organization"
            wire:model="people.{{ $index }}.Community_organization" required>
            <option value="">Seleccione...</option>
            <option value="1">1.-Participa</option>
            <option value="2">2.-No Participa</option>
            <option value="3">3.-NS/NR</option>
        </select>
        @error('people.' . $index . '.Community_organization')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>
