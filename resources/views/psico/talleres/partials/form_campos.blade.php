@php
$config = [
    'format' => 'DD-MM-YYYY  HH:mm',
    'dayViewHeaderFormat' => 'MMM YYYY',
    'minDate' => "js:moment().startOf('day')",
    // 'maxDate' => "js:moment().endOf('day')",
    // 'daysOfWeekDisabled' => [0, 6],
    'locale' => 'es'
];
$configEditor = [
    "height" => "100",
    "toolbar" => [
        // [groupName, [list of button]]
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['font', ['strikethrough', 'superscript', 'subscript']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['height', ['height']]              
    ],
]
@endphp
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
<div class="row">
    <div class="col-12">
        <div class="from-group">
            <label for="tema" class="label">Tema</label>
            
            <input class="form-control @error('tema') is-invalid @enderror" type="text" value="{{ old('tema', $taller->tema ?? '') }}"name="tema" id="tema" >
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
            <label class="label">Población</label>
            <input class="form-control @error('poblacion') is-invalid @enderror" type="text" value="{{old('poblacion',$taller->poblacion ?? '')}}"name="poblacion" >
            @error('poblacion')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>
<div class="form-group">
    <label for="tecnicas_instrumentos">Técnicas e Instrumentos</label>
    <x-adminlte-text-editor name="tecnicas_instrumentos" :config="$configEditor">
        {{ old('tecnicas_instrumentos', $taller->tecnicas_instrumentos ?? '') }}
    </x-adminlte-text-editor>
</div> 