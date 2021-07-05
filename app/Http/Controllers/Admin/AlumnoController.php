<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidarAlumnosRequest;
use App\Models\DatosGenerales;
use App\Models\Persona;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.alumnos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.alumnos.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidarAlumnosRequest $request)
    {
        $request['tipo_persona'] = "Alumno";
        $alumno = Persona::create($request->all());
        // dd($persona);

        return redirect()->route('admin.alumnos.edit',[$alumno])->with('info', 'Se creo el alumno correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function show(Persona $alumno)
    {
        $tutores = Persona::where('tipo_persona','Tutor')->take(2)->get();
        return view('admin.alumnos.show', compact('alumno','tutores')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function edit(Persona $alumno)
    {
        return view('admin.alumnos.edit', compact('alumno')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function update(ValidarAlumnosRequest $request, Persona $alumno)
    {
        $alumno->update($request->all());
        session(['mensaje' => 'El registro se actualizado correctamente.']);
        return redirect()->route('admin.alumnos.edit', [$alumno]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function destroy(Persona $alumno)
    {
        $alumno->delete();
        session(['mensaje' => 'El registro ha sido borrado correctamente.']);
        return redirect()->route('admin.alumnos.index');
    }

    public function verAsignarTutor(Persona $alumno)
    {
        // $tutores = Persona::where('tipo_persona','Tutor')->take(2)->get();
        $tutores = $alumno->tutores()->get();
        $tiposRelaciones = DatosGenerales::where('tipo', 'apoderado')
                                          ->where('activo', 1)
                                          ->select('valor')
                                          ->groupBy('valor')
                                          ->pluck('valor','valor');
        $comboTR = array("" => "Tipo Relación") + $tiposRelaciones->all();

        return view('admin.alumnos.asignar-tutor', compact('alumno', 'tutores', 'comboTR'));
    }

    public function storeAsignarTutor(Request $request, Persona $alumno)
    {
        $tutores = $alumno->tutores()->select('id')->get();
        $idsTutores = []; //8 => ['tipo_relacion' => 'Padre']
        foreach ($tutores as $key => $value) {
            $idsTutores[$value->pivot->tutor_id] = ['tipo_relacion' => $value->pivot->tipo_relacion];
        }
        $idsTutores[$request->get('tutorId')] = ['tipo_relacion' => $request->get('tipo_relacion')];
        $alumno->tutores()->sync($idsTutores);
        return redirect()->route('admin.alumnos.tutores.create', [$alumno]);
    }

    public function quitarTutor(Request $request)
    {
        $alumno =  Persona::find($request->get('alumno_id'));
        $alumno->tutores()->detach($request->get('tutor_id'));
        return redirect()->route('admin.alumnos.tutores.create', [$alumno]);
    }
}
