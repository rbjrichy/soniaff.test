<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidarTuroresRequest;
use App\Models\Persona;

class TutorController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.tutores.index')->only('index');
        $this->middleware('can:admin.tutores.create')->only('create','store');   
        $this->middleware('can:admin.tutores.edit')->only('edit', 'update');   
        $this->middleware('can:admin.tutores.show')->only('show');
        $this->middleware('can:admin.tutores.destroy')->only('destroy');
    }
    
    public function index()
    {
        
        return view('admin.tutores.index');
    }

    
    public function create()
    {
        return view('admin.tutores.create'); 
    }

    
    public function store(ValidarTuroresRequest $request)
    {
        $request['tipo_persona'] = "Tutor";
        $tutor = Persona::create($request->all());
        return redirect()->route('admin.tutores.edit',[$tutor])->with('mensaje', 'Se creo el tutor correctamente');
    }

    public function show(Persona $tutore)
    {
        $tutor = $tutore;
        $tutelados = $tutor->tutelados()->get();

        return view('admin.tutores.show', compact('tutor','tutelados')); 
    }

    public function edit(Persona $tutore)
    {
        $tutor = $tutore;
        return view('admin.tutores.edit', compact('tutor')); 
    }

    public function update(ValidarTuroresRequest $request, Persona $tutore)
    {
        $tutor = $tutore;
        $tutor->update($request->all());
        session(['mensaje' => 'El registro se actualizado correctamente.']);
        return redirect()->route('admin.tutores.edit', [$tutor]);
        
    }

    public function destroy(Persona $tutore)
    {
        $tutor = $tutore;
        $tutor->delete();
        session(['mensaje' => 'El registro ha sido borrado correctamente.']);
        return redirect()->route('admin.tutores.index');
    }
}
