<?php

namespace App\Http\Livewire\Alumno;

use App\Models\Matricula;
use App\Models\Persona;
use Livewire\Component;

class BuscarAlumno extends Component
{
    public $query= '';
    public array $alumnos = [];
    public int $selectedAlumno = 0;
    public int $highlightIndex = 0;
    public bool $showDropdown;
    public array $alumnosMatriculados = [];

    public function mount()
    {
        $this->reset();
        $this->alumnosMatriculados = Matricula::where('gestion', now()->format('Y'))
                                            //   ->where('estado','1')
                                              ->pluck('alumno_id')->toArray();
    }

    public function reset(...$properties)
    {
        $this->alumnos = [];
        $this->highlightIndex = 0;
        $this->query = '';
        $this->selectedAlumno = 0;
        $this->showDropdown = true;
    }

    public function hideDropdown()
    {
        $this->showDropdown = false;
    }

    public function incrementHighlight()
    {
        if ($this->highlightIndex === count($this->alumnos) - 1) {
            $this->highlightIndex = 0;
            return;
        }

        $this->highlightIndex++;
    }

    public function decrementHighlight()
    {
        if ($this->highlightIndex === 0) {
            $this->highlightIndex = count($this->alumnos) - 1;
            return;
        }

        $this->highlightIndex--;
    }

    public function selectTutor($id = null)
    {
        $id = $id ?: $this->highlightIndex;

        $alumno = $this->alumnos[$id] ?? null;

        if ($alumno) {
            $this->showDropdown = true;
            $this->query = $alumno['nombres'] . ' ' . $alumno['apellidos'];
            $this->selectedAlumno = $alumno['id'];
        }
    }

    public function updatedQuery()
    {
        $buscar = $this->query;
        $this->alumnos = Persona::where('tipo_persona','Alumno')
                            ->where(function($query) use($buscar){
                                $query->where('ci_nit', 'like', '%'.$buscar.'%');
                                $query->orWhere('nombres', 'like', '%'.$buscar.'%');
                                $query->orWhere('apellidos', 'like', '%'.$buscar.'%');
                            })
                            ->whereNotIn('id', $this->alumnosMatriculados)
                            ->orderBy('nombres')
                            ->take(5)
                            ->get()
                            ->toArray();
    }
    public function render()
    {
        return view('livewire.alumno.buscar-alumno');
    }
}
