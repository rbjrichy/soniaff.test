<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidarTallerRequest;
use App\Models\Sesion;
use App\Models\Taller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TallerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $talleres = Taller::where('profesion_id', Auth::user()->id)->where('activo',1)->get();
        return view('psico.talleres.index')->with(compact('talleres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('psico.talleres.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidarTallerRequest $request)
    {
        // dd($request->all());
        $request['profesion_id'] = Auth::user()->id;
        $taller = Taller::create($request->all());

        /*creando sesion */ 
        $sesion = new Sesion;
        $sesion->numero_sesion = 1;
        $sesion->actividades = 'Actividad...';
        $sesion->objetivos = 'Objetivo...';
        $sesion->procedimientos = 'Procedimiento...';
        $sesion->materiales = 'materiales...';
        $sesion->duracion = 30;
        $sesion->taller_id = $taller->id;
        $sesion->fecha_hora = $request->get('fecha_inicio');
        $sesion->save();
        
        return redirect()->route('psico.taller.edit',[$taller])->with('mensaje', 'Se creo el taller correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Taller  $taller
     * @return \Illuminate\Http\Response
     */
    public function show(Taller $taller)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Taller  $taller
     * @return \Illuminate\Http\Response
     */
    public function edit(Taller $taller)
    {
        // dd($taller);
        return view('psico.talleres.edit', compact('taller')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Taller  $taller
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Taller $taller)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Taller  $taller
     * @return \Illuminate\Http\Response
     */
    public function destroy(Taller $taller)
    {
        // dd($taller);
        $taller->activo = 0;
        $taller->save();
        return redirect()->route('psico.taller.index');
    }

    public function talleres_historial(Request $request)
    {
        $user_id = Auth::user()->id;
        $gestion = now()->format('Y');
        if ($request->method()=='POST') {
            $gestion = $request->get('gestion');
        }
        $talleres = Taller::where('profesion_id', $user_id)
                            ->whereYear('fecha_inicio', $gestion)
                            ->where('activo',0)
                            ->get();
        $gestiones = Taller::selectRaw('year(fecha_inicio) as gestion')->groupByRaw('gestion')->pluck('gestion','gestion')->toArray();
        $gestiones = [""=>"Gestión"] + $gestiones;
        return view('psico.talleres.historial')->with(compact('talleres','gestiones','gestion'));
    }

    public function sesiones_taller(Taller $taller)
    {
        // dd($taller);
        $sesiones = $taller->sesiones()->get();
        return view('psico.sesiones.taller_sesiones')->with(compact('taller','sesiones'));
    }

    public function controlTallerAlumnos(Taller $taller=null)
    {
        $alumnos = $taller->alumnos;
        // $sesiones = $taller->sesiones()->select('id','numero_sesion')->get();
        $informeTaller = $taller->informeTaller()->first();
        // dd($informeTaller);
        return view('psico.talleres.control_taller_alumno')->with(compact('taller', 'alumnos','informeTaller'));
    }

    public function inscribirAlumnoTaller(Request $request)
    {
        $taller = Taller::findOrfail($request->get('taller_id'));
        if ($taller->alumnoRegistradoTaller($request->get('alumnoId'))) {
            $taller->alumnos()->attach($request->get('alumnoId'));
            session(['mensaje' => 'Registro correcto.']);
        }else{
            session(['mensaje' => 'El alumno ya se encuentra registrado en el taller.']);
        }
        return redirect()->route('psico.taller.control.alumnos.index',[$taller]);
    }
    public function quitarAlumnoTaller(Request $request)
    {
        /* antes de quitar se debe verificar que no tenga ningun informe de taller*/
        // dd($request->all());
        $taller = Taller::findOrfail($request->get('taller_id'));
        $taller->alumnos()->detach($request->get('alumno_id'));
        return redirect()->route('psico.taller.control.alumnos.index',[$taller]);
    }

    public function informeTallerCreate(Taller $taller)
    {
        return view('psico.talleres.informe_taller')->with(compact('taller'));
    }

    // public function informeTallerStore(Request $request, Taller $taller)//ya no se usa
    // {
    //     $taller->resultado = $request->get('resultado');
    //     $taller->save();
    //     session(['mensaje' => 'Informe guardado.']);
    //     return redirect()->route('psico.taller.crear.informe',[$taller]);
    // }

}
