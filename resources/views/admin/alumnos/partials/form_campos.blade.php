@php
$config = [
    'format' => 'DD-MM-YYYY',
    'dayViewHeaderFormat' => 'MMM YYYY',
    // 'minDate' => "js:moment().startOf('month')",
    'maxDate' => "js:moment().endOf('day')",
    // 'daysOfWeekDisabled' => [0, 6],
    'locale' => 'es'
];
@endphp

<div class="row">
    <div class="col-6">
        <div class="from-group">
            <label for="nombres" class="label">Nombres</label>
            <input class="form-control @error('nombres') is-invalid @enderror" type="text" value="{{old('nombres')?old('nombres'):$alumno->nombres}}"name="nombres" id="nombres" >
            @error('nombres')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-6">
        <div class="from-group">
            <label class="label">Apellidos</label>
            <input class="form-control @error('apellidos') is-invalid @enderror" type="text" value="{{old('apellidos')?old('apellidos'):$alumno->apellidos}}"name="apellidos" >
            @error('apellidos')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>
<div class="row">
    <div class="col-6">
        <div class="from-group">
            <label for="ci_nit" class="label">Cedula Identidad</label>
            <input class="form-control @error('ci_nit') is-invalid @enderror" type="number" value="{{old('ci_nit')?old('ci_nit'):$alumno->ci_nit}}"name="ci_nit" id="ci_nit" >
            @error('ci_nit')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-6">
        <div class="from-group">
            <label class="label">Género</label>
            <div>
                <label>Masculino
                    <input type="radio" value="Masculino" name="genero"
                    @if (old('genero'))
                        @if (old('genero') == "Masculino")
                            {{'checked="checked"'}}
                        @endif
                    @else 
                        @if ($alumno->genero == "Masculino")
                            {{'checked="checked"'}}
                        @endif
                    @endif
                    >
                </label>
                <label>Femenino
                    <input type="radio" value="Femenino" name="genero"
                    @if (old('genero'))
                        @if (old('genero') == "Femenino")
                            {{'checked="checked"'}}
                        @endif
                    @else 
                        @if ($alumno->genero == "Femenino")
                            {{'checked="checked"'}}
                        @endif
                    @endif
                    >
                </label>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-6">
        <x-adminlte-input-date name="fecha_nac" label="Fecha de Nacimiento" igroup-size="sm"
    :config="$config" value="{{old('fecha_nac')?old('fecha_nac'):$alumno->fecha_nac->format('d-m-Y')}}" placeholder="Fecha de nacimiento">
            <x-slot name="appendSlot">
                <div class="input-group-text bg-dark">
                    <i class="fas fa-calendar-day"></i>
                </div>
            </x-slot>
        </x-adminlte-input-date>
    </div>
    <div class="col-6">
        <div class="from-group">
            <label class="label">Lugar de Nacimiento</label>
            <input class="form-control @error('lugar_nac') is-invalid @enderror" type="text" name="lugar_nac" value="{{old('lugar_nac')?old('lugar_nac'):$alumno->lugar_nac}}">
            @error('lugar_nac')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>
<div class="row">
    
    <div class="col-6">
        <div class="from-group">
            <label class="label">Escolaridad</label>
            <input class="form-control @error('escolaridad') is-invalid @enderror" type="text" value="{{old('escolaridad')?old('escolaridad'):$alumno->escolaridad}}"name="escolaridad" placeholder="Curso - Paralelo - Nivel">
            @error('escolaridad')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-6">
        <div class="from-group">
            <label class="label">Idioma</label>
            <input class="form-control @error('idioma') is-invalid @enderror" type="text" name="idioma" value="{{old('idioma')?old('idioma'):$alumno->idioma}}">
            @error('idioma')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>
<div class="row">
    <div class="col-6">
        <div class="from-group">
            <label class="label">Número Telofónico</label>
            <input class="form-control @error('telefonos') is-invalid @enderror" type="text" value="{{old('telefonos')?old('telefonos'):$alumno->telefonos}}"name="telefonos" placeholder="7000000; 78544444">
            @error('telefonos')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-6">
        <div class="from-group">
            <label class="label">Dirección</label>
            <input class="form-control @error('direccion') is-invalid @enderror" type="text" name="direccion" value="{{old('direccion')?old('direccion'):$alumno->direccion}}">
            @error('direccion')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>

