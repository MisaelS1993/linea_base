<div class="col-md-6 col-12">
    <div class="form-group">
        <label for="read_write">Sabe Leer y Escribir</label>
        <select class="form-control @error('people.' . $index . '.read_write') is-invalid @enderror" id="respuesta" 
        wire:model="people.{{ $index }}.read_write" required>
            <option value="">Seleccione...</option>
            <option value="1">Sí</option>
            <option value="2">No</option>
            <option value="3">NS/NR</option>
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
            <option value="1">Sí</option>
            <option value="2">No</option>
            <option value="3">NS/NR</option>
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
<<<<<<< Updated upstream
        <option value="1">Pre-escolar</option>
        <option value="2">Grado 1</option>
        <option value="3">Grado 2</option>
        <option value="4">Grado 3</option>
        <option value="5">Grado 4</option>
        <option value="6">Grado 5</option>
        <option value="7">Grado 6</option>
        <option value="8">Grado 7</option>
        <option value="9">Grado 8</option>
        <option value="10">Grado 9</option>
        <option value="11">Diversificado</option>
        <option value="12">Universitario</option>
        <option value="13">Ninguno</option>
=======
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
>>>>>>> Stashed changes
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