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
        $alumnos = Persona::where('tipo_persona', 'Alumno')
                          ->where('ci_nit', 'like', '%'.$this->search.'%')
                          ->where('nombres', 'like', '%'.$this->search.'%')
                          ->where('apellidos', 'like', '%'.$this->search.'%')
                          ->orderBy('escolaridad')
                          ->paginate();
                          
        return view('livewire.admin.alumnos-index', compact('alumnos'));
    }
}
