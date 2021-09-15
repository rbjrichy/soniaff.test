@php
$config = [
    'format' => 'DD-MM-YYYY HH:mm',
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
        ['fontsize', ['12']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['height', ['height']]              
    ],
]
@endphp
<div class="row">
        <a href="{{route('psico.taller.sesiones', [$taller])}}" class="btn btn-sm btn-primary m-2">Control de Sesiones</a>
</div>
<div class="row">
    <div class="col-3">
        <x-adminlte-input name="numero_sesion" label="Numero de Sesión" placeholder="Numero de Sesión" type="number"
        igroup-size="sm" min=1 max=10 value="{{ old('numero_sesion', $sesion->numero_sesion ?? $numSesion) }}">
        <x-slot name="appendSlot">
            <div class="input-group-text bg-dark">
                <i class="fas fa-hashtag"></i>
            </div>
        </x-slot>
    </x-adminlte-input>
    </div>
    <div class="col-3">
        <x-adminlte-input-date name="fecha_hora" label="Fecha/Hora" igroup-size="sm"
    :config="$config" value="{{ old('fecha_hora', (isset($sesion)?$sesion->fecha_hora->format('d-m-Y HH:i'):'') ?? '') }}" placeholder="Fecha y Hora">
            <x-slot name="appendSlot">
                <div class="input-group-text bg-dark">
                    <i class="fas fa-calendar-day"></i>
                </div>
            </x-slot>
        </x-adminlte-input-date>
    </div>
    <div class="col-3">
        <x-adminlte-input name="duracion" label="Duración (min.)" placeholder="Duración de la sesion" type="number"
        igroup-size="sm" min=30 max=120 value="{{ old('duracion', $sesion->duracion ?? '') }}">
        <x-slot name="appendSlot">
            <div class="input-group-text bg-dark">
                <i class="fas fa-hashtag"></i>
            </div>
        </x-slot>
    </x-adminlte-input>
    </div>
</div>

<div class="row">
    <div class="form-group">
        <label for="actividades">Actividades</label>
        <x-adminlte-text-editor name="actividades" :config="$configEditor">
            {{ old('actividades', $sesion->actividades ?? '') }}
        </x-adminlte-text-editor>
    </div>
    <div class="form-group">
        <label for="objetivos">Objetivos</label>
        <x-adminlte-text-editor name="objetivos" :config="$configEditor">
            {{ old('objetivos', $sesion->objetivos ?? '') }}
        </x-adminlte-text-editor>
    </div>
    <div class="form-group">
        <label for="procedimientos">Procedimientos</label>
        <x-adminlte-text-editor name="procedimientos" :config="$configEditor">
            {{ old('procedimientos', $sesion->materiales ?? '') }}
        </x-adminlte-text-editor>
    </div> 
    <div class="form-group">
        <label for="materiales">Materiales</label>
        <x-adminlte-text-editor name="materiales" :config="$configEditor">
            {{ old('materiales', $sesion->materiales ?? '') }}
        </x-adminlte-text-editor>
    </div>   
</div>

