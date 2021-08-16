<div>
    <div class="position-relative">
        <div class="input-group">
            <input
                type="text"
                class="position-relative form-control bg-white rounded"
                placeholder="Buscar Alumno"
                wire:model="query"
                wire:click="reset"
                wire:keydown.escape="hideDropdown"
                wire:keydown.tab="hideDropdown"
                wire:keydown.Arrow-Up="decrementHighlight"
                wire:keydown.Arrow-Down="incrementHighlight"
                wire:keydown.enter.prevent="selectAlumno"
            />
            @if ($selectedAlumno)
                <div class="input-group-append">
                    <button wire:click="reset" type="button" class="btn" data-card-widget="remove"><i class="fas fa-times"></i>
                    </button>
                </div>
            @endif
        </div>  

        <input type="hidden" name="alumnoId" id="alumnoId" wire:model="selectedAlumno">
        
        @if(!empty($query) && $selectedAlumno == 0 && $showDropdown)
        <div class="list-group">
            @if (!empty($alumnos))
                @foreach($alumnos as $i => $alumno)
                    <a 
                    wire:click="selectAlumno({{ $i }})"
                    class="list-group-item list-group-item-action {{ $highlightIndex === $i ? 'bg-primary' : '' }}"
                    >{{ $alumno['nombres'] }} {{ $alumno['apellidos'] }} - {{$alumno['ci_nit']}} </a>
                @endforeach
            @else
            <span class="form-control">No hay resultados!</span>
            @endif
        </div>
        @endif
        
    </div>
</div>
