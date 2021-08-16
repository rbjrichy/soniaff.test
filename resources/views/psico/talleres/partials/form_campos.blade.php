@php
$config = [
    'format' => 'DD-MM-YYYY',
    'dayViewHeaderFormat' => 'MMM YYYY',
    'minDate' => "js:moment().startOf('day')",
    // 'maxDate' => "js:moment().endOf('day')",
    // 'daysOfWeekDisabled' => [0, 6],
    'locale' => 'es'
];
@endphp
<div class="row">
    <div class="col-12">
        <div class="from-group">
            <label for="nombre_taller" class="label">Nombre_taller</label>
            
            <input class="form-control @error('nombre_taller') is-invalid @enderror" type="text" value="{{ old('nombre_taller', $taller->nombre_taller ?? '') }}"name="nombre_taller" id="nombre_taller" >
            @error('nombre_taller')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="from-group">
            <label class="label">Descripción</label>
            <input class="form-control @error('descripcion') is-invalid @enderror" type="text" value="{{old('descripcion',$taller->descripcion ?? '')}}"name="descripcion" >
            @error('descripcion')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>
<div class="row">
    <div class="col-6">
        <x-adminlte-input-date name="fecha_inicio" label="Fecha Inicio" igroup-size="sm"
    :config="$config" value="{{ old('fecha_inicio', (isset($taller)?$taller->fecha_inicio->format('d-m-Y'):'') ?? '') }}" placeholder="Fecha Inicio">
            <x-slot name="appendSlot">
                <div class="input-group-text bg-dark">
                    <i class="fas fa-calendar-day"></i>
                </div>
            </x-slot>
        </x-adminlte-input-date>
    </div>
</div>