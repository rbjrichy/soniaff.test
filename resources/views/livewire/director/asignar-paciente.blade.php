<div>
    <div class="position-relative">
        <div class="input-group">
            <input
                type="text"
                class="position-relative form-control bg-white rounded"
                placeholder="Seleccionar alumno"
                wire:model="query"
                wire:click="reset"
                wire:keydown.escape="hideDropdown"
                wire:keydown.tab="hideDropdown"
                wire:keydown.Arrow-Up="decrementHighlight"
                wire:keydown.Arrow-Down="incrementHighlight"
                wire:keydown.enter.prevent="selectTutor"
            />
            @if ($selectedAlumno)
                <div class="input-group-append">
                    <button wire:click="reset" type="button" class="btn" data-card-widget="remove"><i class="fas fa-times"></i>
                    </button>
                </div>
            @endif
        </div>  

        <input type="hidden" name="alumno_id" id="alumno_id" wire:model="selectedAlumno">
        
        @if(!empty($query) && $selectedAlumno == 0 && $showDropdown)
        <div class="list-group">
            @if (!empty($pacientes))
                @foreach($pacientes as $i => $paciente)
                    <a 
                    wire:click="selectTutor({{ $i }})"
                    class="list-group-item list-group-item-action {{ $highlightIndex === $i ? 'bg-primary' : '' }}"
                    >{{ $paciente['nombres'] }} {{ $paciente['apellidos'] }} - {{$paciente['ci_nit']}} </a>
                @endforeach
            @else
            <span class="form-control">No hay resultados!</span>
            @endif
        </div>
        @endif
        
    </div>
</div>
