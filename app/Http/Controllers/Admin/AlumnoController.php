<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidarAlumnosRequest;
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
        $persona = Persona::create($request->all());
        // dd($persona);

        return redirect()->route('admin.alumnos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function show(Persona $alumno)
    {
        //
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
}
