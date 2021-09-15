<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidarSesionRequest;
use App\Models\Sesion;
use App\Models\Taller;
use Illuminate\Http\Request;

class SesionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Taller $taller)
    {
        $numSesion = $taller->sesiones()->count();
        $numSesion++;
        return view('psico.sesiones.create')->with(compact('taller','numSesion'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidarSesionRequest $request)
    {
        // dd($request->all());
        Sesion::create($request->all());   
        return redirect()->route('psico.taller.sesiones',[$request->get('taller_id')])->with('mensaje', 'Se creo la sesión correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sesion  $sesion
     * @return \Illuminate\Http\Response
     */
    public function show(Sesion $sesion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sesion  $sesion
     * @return \Illuminate\Http\Response
     */
    public function edit(Sesion $sesion)
    {
        $taller = $sesion->taller()->first();
        // dd($taller);
        return view('psico.sesiones.edit')->with(compact('sesion', 'taller'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sesion  $sesion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sesion $sesion)
    {
        $sesion->update($request->all());
        session(['mensaje' => 'El registro se actualizado correctamente.']);
        return redirect()->route('psico.sesion.edit', [$sesion]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sesion  $sesion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sesion $sesion)
    {
        // dd($sesion);
        $taller = $sesion->taller()->first();
        $sesion->delete();
        session(['mensaje' => 'El registro ha sido borrado correctamente.']);
        return redirect()->route('psico.taller.sesiones',[$taller]);
    }
}
