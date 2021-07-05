<div>
    <div class="position-relative">
        <div class="input-group">
            <input
                type="text"
                class="position-relative form-control bg-white rounded"
                placeholder="Buscar Tutor..."
                wire:model="query"
                wire:click="reset"
                wire:keydown.escape="hideDropdown"
                wire:keydown.tab="hideDropdown"
                wire:keydown.Arrow-Up="decrementHighlight"
                wire:keydown.Arrow-Down="incrementHighlight"
                wire:keydown.enter.prevent="selectTutor"
            />
            @if ($selectedTutor)
                <div class="input-group-append">
                    <button wire:click="reset" type="button" class="btn" data-card-widget="remove"><i class="fas fa-times"></i>
                    </button>
                </div>
            @endif
        </div>  

        <input type="hidden" name="tutorId" id="tutorId" wire:model="selectedTutor">
        
        @if(!empty($query) && $selectedTutor == 0 && $showDropdown)
        <div class="list-group">
            @if (!empty($tutores))
                @foreach($tutores as $i => $tutor)
                    <a 
                    wire:click="selectTutor({{ $i }})"
                    class="list-group-item list-group-item-action {{ $highlightIndex === $i ? 'bg-primary' : '' }}"
                    >{{ $tutor['nombres'] }} {{ $tutor['apellidos'] }} - {{$tutor['ci_nit']}} </a>
                @endforeach
            @else
            <span class="form-control">No hay resultados!</span>
            @endif
        </div>
        @endif
        
    </div>
</div>