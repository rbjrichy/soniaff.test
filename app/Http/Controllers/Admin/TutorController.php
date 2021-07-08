<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidarTuroresRequest;
use App\Models\Persona;

class TutorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('admin.tutores.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tutores.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidarTuroresRequest $request)
    {
        // dd($request->all());
        $request['tipo_persona'] = "Tutor";
        $tutor = Persona::create($request->all());
        return redirect()->route('admin.tutores.edit',[$tutor])->with('mensaje', 'Se creo el tutor correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Persona $tutore)
    {
        $tutor = $tutore;
        $tutelados = $tutor->tutelados()->get();

        return view('admin.tutores.show', compact('tutor','tutelados')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Persona $tutore)
    {
        $tutor = $tutore;
        return view('admin.tutores.edit', compact('tutor')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidarTuroresRequest $request, Persona $tutore)
    {
        $tutor = $tutore;
        $tutor->update($request->all());
        session(['mensaje' => 'El registro se actualizado correctamente.']);
        return redirect()->route('admin.tutores.edit', [$tutor]);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Persona $tutore)
    {
        $tutor = $tutore;
        $tutor->delete();
        session(['mensaje' => 'El registro ha sido borrado correctamente.']);
        return redirect()->route('admin.tutores.index');
    }
}
