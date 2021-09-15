<?php

namespace App\Http\Controllers\Director;

use App\Http\Controllers\Controller;
use App\Models\Admin\Profesion;
use App\Models\Persona;
use Illuminate\Http\Request;

class DirectorController extends Controller
{
    public function listaPsicologos()
    {
        $psicologos = Profesion::with('persona')->get();
        // dd($psicologos);
        return view('director.lista_psicologos')->with(compact('psicologos'));
    }
    public function listaPacientes(Profesion $psicologo)
    {
        $psicologo->pacientes;
        $psicologo->psicologo;
        return view('director.lista_pacientes')->with(compact('psicologo'));
    }
}
