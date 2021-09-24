<?php

namespace App\Http\Controllers;

use App\Http\Traits\GeneradorCodigos;
use App\Models\Matricula;
use App\Models\Persona;
use App\Models\Tarifa;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Validator;

class MatriculaController extends Controller
{
    use GeneradorCodigos;

    public function listaMatriculados()
    {
        $matriculados = Matricula::with('alumno')->orderByRaw('estado desc')->get();
        // dd($matriculados);
        return view('director.matriculas.lista_matriculados')->with(compact('matriculados'));
    }
    
    public function matricularAlumnoCreate()
    {
        $tarifas = Tarifa::where('estado','1')->selectRaw('concat(tipo_tarifa, " - ", CAST(monto AS DECIMAL(8,2))) as tarifa, id')->get()->pluck('tarifa','id')->toArray();
        return view('director.matriculas.create')->with(compact('tarifas'));
    }

    public function matricularAlumnoStore(Request $request)
    {
        $request['fecha_matriculacion'] = now();
        $request['gestion'] = now()->format('Y');
        
        // dd($request->all());
        $reglas = [
            'alumno_id' => 'required|numeric|gt:0',
            'tarifa_defecto_id' => 'required|numeric|gt:0',
        ];
        $mensajes = [
            'alumno_id.gt' => 'Debe Seleccionar un alumno',
            'tarifa_defecto_id.gt' => 'Debe seleccionar una tarifa.',
        ];

        Validator::make($request->all(), $reglas, $mensajes)->validate();
        $reglas = Arr::add($reglas, 'codigo','unique:matriculas');
        // dd($reglas);
        $codigo = $this->generarCodigo(Config::get('constants.codMatricula'));
        $request['codigo']= $codigo->codigo;
        $validado = Validator::make($request->all(), $reglas, $mensajes)->validate();

        Matricula::create($request->all());
        return redirect()->route('director.matriculas.lista.matriculados');
    }

    public function matricularAlumnoEdit(Matricula $matricula)
    {
        $tarifas = Tarifa::where('estado','1')->selectRaw('concat(tipo_tarifa, " - ", CAST(monto AS DECIMAL(8,2))) as tarifa, id')->get()->pluck('tarifa','id')->toArray();
        $matricula->alumno;
        return view('director.matriculas.edit')->with(compact('tarifas','matricula'));
    }

    public function matricularAlumnoUpdate(Request $request)
    {
        $matricula = Matricula::findOrFail($request->get('matricula_id'));
        $matricula->tarifa_defecto_id = $request->get('tarifa_defecto_id');
        // dd($matricula->alumno->id);
        $matricula->save();
        session(['mensaje' => 'Se actualizo la tarifa por defecto.']);
        return redirect()->route('director.matriculas.edit',[$matricula->id]);
    }

    public function darBajaMatriculaDelete(Request $request)
    {
        // dd($request->all());
        $matricula = Matricula::findOrFail($request->get('matricula_id'));
        $matricula->estado = 0;
        $matricula->save();
        return redirect()->route('director.matriculas.lista.matriculados');

    }

    public function darBajaMatricula(Matricula $matricula)
    {
        return view('director.matriculas.dar_baja_matricula')->with(compact('matricula'));
    }
}
