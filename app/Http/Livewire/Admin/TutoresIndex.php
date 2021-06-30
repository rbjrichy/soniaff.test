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
        $tutores = Persona::where('tipo_persona', 'Tutor')
                          ->where('ci_nit', 'like', '%'.$this->search.'%')
                          ->where('nombres', 'like', '%'.$this->search.'%')
                          ->where('apellidos', 'like', '%'.$this->search.'%')
                          ->orderBy('nombres')
                          ->paginate();
        return view('livewire.admin.tutores-index', compact('tutores'));
    }
}
