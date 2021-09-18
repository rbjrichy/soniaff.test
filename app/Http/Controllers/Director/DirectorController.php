<?php

namespace App\Http\Controllers\Director;

use App\Http\Controllers\Controller;
use App\Models\Admin\Profesion;
use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        // dd(DB::table('paciente')->pluck('alumno_id')->toArray());
        return view('director.lista_pacientes')->with(compact('psicologo'));
    }
    public function asignarPacientePsicologo(Request $request)
    {
        // dd($request->all());
        $psicologo = Profesion::findOrFail($request->get('psicologo_id'));
        if ($request->get('alumno_id')>0) {
            $psicologo->pacientes()->attach($request->get('alumno_id'));
        }
        return redirect()->route('director.lista.pacientes.psicologo',[$psicologo]);
    }

    public function quitarPacientePsicologo(Request $request)
    {
        // dd($request->all());
        $psicologo = Profesion::findOrFail($request->get('psicologo_id'));
        if ($request->get('alumno_id')>0) {
            $psicologo->pacientes()->detach($request->get('alumno_id'));
        }
        return redirect()->route('director.lista.pacientes.psicologo',[$psicologo]);
    }
}
