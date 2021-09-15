<?php

namespace App\Http\Livewire\Psicologo;

use App\Models\Persona;
use App\Models\Taller;
use Livewire\Component;

class AsignarAlumnoTaller extends Component
{
    public $query= '';
    public array $alumnos = [];
    public int $selectedAlumno = 0;
    public int $highlightIndex = 0;
    public bool $showDropdown;

    public function mount()
    {
        $this->reset();
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

    public function selectAlumno($id = null)
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
        // $this->alumnos = [];
        $buscar = $this->query;
        // if(strlen($buscar) > 1)
        $this->alumnos = Persona::whereIn('tipo_persona',['Alumno', 'Tutor'])
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
        return view('livewire.psicologo.asignar-alumno-taller');
    }
}
