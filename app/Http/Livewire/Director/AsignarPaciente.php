<?php

namespace App\Http\Livewire\Director;

use App\Models\Persona;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AsignarPaciente extends Component
{
    public $query= '';
    public array $pacientes = [];
    public int $selectedAlumno = 0;
    public int $highlightIndex = 0;
    public bool $showDropdown;
    public array $pacientesAsignados = [];

    public function mount()
    {
        $this->reset();
        $this->pacientesAsignados = DB::table('paciente')->pluck('alumno_id')->toArray();
    }

    public function reset(...$properties)
    {
        $this->pacientes = [];
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
        if ($this->highlightIndex === count($this->pacientes) - 1) {
            $this->highlightIndex = 0;
            return;
        }

        $this->highlightIndex++;
    }

    public function decrementHighlight()
    {
        if ($this->highlightIndex === 0) {
            $this->highlightIndex = count($this->pacientes) - 1;
            return;
        }

        $this->highlightIndex--;
    }

    public function selectTutor($id = null)
    {
        $id = $id ?: $this->highlightIndex;

        $tutor = $this->pacientes[$id] ?? null;

        if ($tutor) {
            $this->showDropdown = true;
            $this->query = $tutor['nombres'] . ' ' . $tutor['apellidos'];
            $this->selectedAlumno = $tutor['id'];
        }
    }

    public function updatedQuery()
    {
        // $this->pacientes = [];
        $buscar = $this->query;
        // if(strlen($buscar) > 1)
        $this->pacientes = Persona::where('tipo_persona','Alumno')
                            ->where(function($query) use($buscar){
                                $query->where('ci_nit', 'like', '%'.$buscar.'%');
                                $query->orWhere('nombres', 'like', '%'.$buscar.'%');
                                $query->orWhere('apellidos', 'like', '%'.$buscar.'%');
                            })
                            ->whereNotIn('id', $this->pacientesAsignados)
                            ->orderBy('nombres')
                            ->take(5)
                            ->get()
                            ->toArray();
    }
    public function render()
    {
        return view('livewire.director.asignar-paciente');
    }
}
