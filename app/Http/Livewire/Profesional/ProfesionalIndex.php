<?php

namespace App\Http\Livewire\Profesional;

use App\Models\Persona;
use Livewire\Component;
use Livewire\WithPagination;

class ProfesionalIndex extends Component
{
    use WithPagination;

    public $search;

    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }
    
    public function render()
    {
        $buscar = $this->search;
        $profs = Persona::with('profesion')
                            ->where('tipo_persona', 'Profesional')
                            ->where(function($query) use($buscar){
                                $query->where('ci_nit', 'like', '%'.$buscar.'%');
                                $query->orWhere('nombres', 'like', '%'.$buscar.'%');
                                $query->orWhere('apellidos', 'like', '%'.$buscar.'%');
                            })
                          ->orderBy('nombres')
                          ->paginate();
        return view('livewire.profesional.profesional-index', compact('profs'));
    }
}
