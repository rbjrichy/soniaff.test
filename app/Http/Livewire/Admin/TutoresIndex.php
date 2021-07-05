<?php

namespace App\Http\Livewire\Admin;

use App\Models\Persona;
use Livewire\Component;
use Livewire\WithPagination;

class TutoresIndex extends Component
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
        $tutores = Persona::where('tipo_persona', 'Tutor')
                            ->where(function($query) use($buscar){
                                $query->where('ci_nit', 'like', '%'.$buscar.'%');
                                $query->orWhere('nombres', 'like', '%'.$buscar.'%');
                                $query->orWhere('apellidos', 'like', '%'.$buscar.'%');
                            })
                          ->orderBy('nombres')
                          ->paginate();
        return view('livewire.admin.tutores-index', compact('tutores'));
    }
}
