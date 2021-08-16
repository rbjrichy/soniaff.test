@php
$config = [
    'format' => 'DD-MM-YYYY',
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



<div class="row col-12">
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
        <label for="materiales">Materiales</label>
        <x-adminlte-text-editor name="materiales" :config="$configEditor">
            {{ old('materiales', $sesion->materiales ?? '') }}
        </x-adminlte-text-editor>
    </div>   
</div>

<div class="row">
    <div class="col-4">
        <x-adminlte-input-date name="fecha" label="Fecha" igroup-size="sm"
    :config="$config" value="{{ old('fecha', (isset($sesion)?$sesion->fecha->format('d-m-Y'):'') ?? '') }}" placeholder="Fecha">
            <x-slot name="appendSlot">
                <div class="input-group-text bg-dark">
                    <i class="fas fa-calendar-day"></i>
                </div>
            </x-slot>
        </x-adminlte-input-date>
    </div>
</div>