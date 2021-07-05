<?php

namespace App\Http\Livewire\Admin;

use App\Models\Persona;
use Livewire\Component;
use Livewire\WithPagination;

class AlumnosIndex extends Component
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
        $alumnos = Persona::where('tipo_persona', 'Alumno')
                          ->where(function($query) use($buscar){
                            $query->where('ci_nit', 'like', '%'.$buscar.'%');
                            $query->orWhere('nombres', 'like', '%'.$this->search.'%');
                            $query->orWhere('apellidos', 'like', '%'.$this->search.'%');
                          })
                          ->orderBy('escolaridad')
                          ->paginate();
                          
        return view('livewire.admin.alumnos-index', compact('alumnos'));
    }
}
