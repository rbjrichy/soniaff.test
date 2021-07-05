<?php

namespace App\Http\Livewire\Tutor;

use App\Models\Persona;
use Livewire\Component;

class AsignarTutor extends Component
{
    public $query= '';
    public array $tutores = [];
    public int $selectedTutor = 0;
    public int $highlightIndex = 0;
    public bool $showDropdown;

    public function mount()
    {
        $this->reset();
    }

    public function reset(...$properties)
    {
        $this->tutores = [];
        $this->highlightIndex = 0;
        $this->query = '';
        $this->selectedTutor = 0;
        $this->showDropdown = true;
    }

    public function hideDropdown()
    {
        $this->showDropdown = false;
    }

    public function incrementHighlight()
    {
        if ($this->highlightIndex === count($this->tutores) - 1) {
            $this->highlightIndex = 0;
            return;
        }

        $this->highlightIndex++;
    }

    public function decrementHighlight()
    {
        if ($this->highlightIndex === 0) {
            $this->highlightIndex = count($this->tutores) - 1;
            return;
        }

        $this->highlightIndex--;
    }

    public function selectTutor($id = null)
    {
        $id = $id ?: $this->highlightIndex;

        $tutor = $this->tutores[$id] ?? null;

        if ($tutor) {
            $this->showDropdown = true;
            $this->query = $tutor['nombres'] . ' ' . $tutor['apellidos'];
            $this->selectedTutor = $tutor['id'];
        }
    }

    public function updatedQuery()
    {
        // $this->tutores = [];
        $buscar = $this->query;
        // if(strlen($buscar) > 1)
        $this->tutores = Persona::where('tipo_persona','Tutor')
                            ->where(function($query) use($buscar){
                                $query->where('ci_nit', 'like', '%'.$buscar.'%');
                                $query->orWhere('nombres', 'like', '%'.$buscar.'%');
                                $query->orWhere('apellidos', 'like', '%'.$buscar.'%');
                            })
                            ->orderBy('nombres')
                            ->take(5)
                            ->get()
                            ->toArray();
    }

    public function render()
    {
        
        return view('livewire.tutor.asignar-tutor');
    }
}
