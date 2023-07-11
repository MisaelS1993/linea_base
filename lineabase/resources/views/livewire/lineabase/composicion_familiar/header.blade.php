<div class="col-md-6 col-12">
    <div class="form-group">
        <label for="name">Nombre</label>
        <input type="text" id="name" class="form-control  @error('people.'.$index.'.name') is-invalid @enderror"
            wire:model="people.{{ $index }}.name" placeholder="Nombre"
            required>
            @error('people.'.$index.'.name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
    </div>
</div>
<div class="col-md-6 col-12">
    <div class="form-group">
        <label for="age">Edad</label>
        <input type="text" id="age" class="form-control @error('people.'.$index.'.age') is-invalid @enderror"
            wire:model="people.{{ $index }}.age" placeholder="Edad"
            required>
        @error('people.'.$index.'.age')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>