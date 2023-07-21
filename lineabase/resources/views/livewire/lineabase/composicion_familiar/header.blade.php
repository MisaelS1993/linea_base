<div class="col-md-6 col-12">
    <div class="form-group">
        <label for="name">Nombre</label>
        <input type="text" id="name"
            class="form-control  @error('people.' . $index . '.name') is-invalid @enderror"
            wire:model="people.{{ $index }}.name" placeholder="Nombre" required>
        @error('people.' . $index . '.name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>

<div class="col-md-6 col-12">
    <div class="form-group">
        <label for="sex">Sexo</label>
        <select class="form-control @error('people.' . $index . '.sex') is-invalid @enderror" id="sex"
            wire:model="people.{{ $index }}.sex" required>
            <option value="">Seleccione...</option>
            <option value="masculino">Masculino</option>
            <option value="femenino">Femenino</option>
        </select>
        @error('people.' . $index . '.sex')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>

<div class="col-md-6 col-12">
    <div class="form-group">
        <label for="relationship">Parentesco</label>
        <select class="form-control @error('people.' . $index . '.relationship') is-invalid @enderror" id="relationship"
        wire:model="people.{{ $index }}.relationship" required>
            <option value="">Seleccione...</option>
<<<<<<< Updated upstream
            <option value="1">Jefe de familia</option>
            <option value="2">Esposa/compañera(o) del jefe</option>
            <option value="3">Hijos solteros</option>
            <option value="4">Hijos casados</option>
            <option value="5">Yerno o nuera</option>
            <option value="6">Nietos</option>
            <option value="7">Hijastro(a)</option>
            <option value="8">Padres y suegros</option>
            <option value="9">Otros familiares</option>
            <option value="10">Servicio doméstico</option>
            <option value="11">Otros no familiares</option>
=======
            <option value="1">1.-Jefe de familia</option>
            <option value="2">2.-Esposa/compañera(o) del jefe</option>
            <option value="3">3.-Hijos solteros</option>
            <option value="4">4.-Hijos casados</option>
            <option value="5">5.-Yerno o nuera</option>
            <option value="6">6.-Nietos</option>
            <option value="7">7.-Hijastro(a)</option>
            <option value="8">8.-Padres y suegros</option>
            <option value="9">9.-Otros familiares</option>
            <option value="10">10.-Servicio doméstico</option>
            <option value="11">11.-Otros no familiares</option>
>>>>>>> Stashed changes
          </select>
        @error('people.' . $index . '.relationship')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>

<div class="col-md-6 col-12">
    <div class="form-group">
        <label for="ethnicity">Etnia</label>
        <select class="form-control @error('people.' . $index . '.ethnicity') is-invalid @enderror" id="ethnicity" 
        wire:model="people.{{ $index }}.ethnicity" required>
<<<<<<< Updated upstream
            <option value="">Seleccionar etnia</option>
            <option value="1">Maya</option>
            <option value="2">Chortí</option>
            <option value="3">Lenca</option>
            <option value="4">Misquito</option>
            <option value="5">Nahua</option>
            <option value="6">Pech</option>
            <option value="7">Tolupán</option>
            <option value="8">Tawaka</option>
            <option value="9">Garífuna</option>
            <option value="10">Negro de habla inglesa</option>
            <option value="11">Mestizo/Ladino</option>
            <option value="12">Otro</option>
            <option value="13">NS/NR</option>
=======
            <option value="">Seleccione...</option>
            <option value="1">1.-Maya</option>
            <option value="2">2.-Chortí</option>
            <option value="3">3.-Lenca</option>
            <option value="4">4.-Misquito</option>
            <option value="5">5.-Nahua</option>
            <option value="6">6.-Pech</option>
            <option value="7">7.-Tolupán</option>
            <option value="8">8.-Tawaka</option>
            <option value="9">9.-Garífuna</option>
            <option value="10">10.-Negro de habla inglesa</option>
            <option value="11">11.-Mestizo/Ladino</option>
            <option value="12">12.-Otro</option>
            <option value="13">13.-NS/NR</option>
>>>>>>> Stashed changes
          </select>
        @error('people.' . $index . '.ethnicity')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>

<div class="col-md-6 col-12">
    <div class="form-group">
        <label for="age">Edad</label>
        <input type="number" id="age"
            class="form-control @error('people.' . $index . '.age') is-invalid @enderror"
            wire:model="people.{{ $index }}.age" placeholder="Edad" required>
        @error('people.' . $index . '.age')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>