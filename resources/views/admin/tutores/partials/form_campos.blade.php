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
            
            <input class="form-control @error('nombres') is-invalid @enderror" type="text" value="{{ old('nombres', $tutor->nombres ?? '') }}"name="nombres" id="nombres" >
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
            <input class="form-control @error('apellidos') is-invalid @enderror" type="text" value="{{old('apellidos',$tutor->apellidos ?? '')}}"name="apellidos" >
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
            <input class="form-control @error('ci_nit') is-invalid @enderror" type="number" value="{{old('ci_nit', $tutor->ci_nit ?? '')}}"name="ci_nit" id="ci_nit" >
            @error('ci_nit')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-6">
        <div class="from-group">
            <label class="label">Idioma</label>
            <input class="form-control @error('idioma') is-invalid @enderror" type="text" name="idioma" value="{{ old('idioma', $tutor->idioma ?? '')}}">
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
            <input class="form-control @error('telefonos') is-invalid @enderror" type="text" value="{{ old('telefonos', $tutor->telefonos ?? '')}}"name="telefonos" placeholder="7000000; 78544444">
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
            <input class="form-control @error('direccion') is-invalid @enderror" type="text" name="direccion" value="{{old('direccion', $tutor->direccion ?? '')}}">
            @error('direccion')
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
            <label class="label">ocupación</label>
            <input class="form-control @error('ocupacion') is-invalid @enderror" type="text" value="{{ old('ocupacion', $tutor->ocupacion ?? '')}}"name="ocupacion" >
            @error('ocupacion')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>

