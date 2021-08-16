<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidarProfesionalRequest;
use App\Models\Admin\Profesion;
use App\Models\Persona;
use Illuminate\Http\Request;

class ProfesionalController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('can:admin.prof.index')->only('index');
        $this->middleware('can:admin.prof.create')->only('create','store');   
        $this->middleware('can:admin.prof.edit')->only('edit', 'update');   
        $this->middleware('can:admin.prof.show')->only('show');
        $this->middleware('can:admin.prof.destroy')->only('destroy');
    }

    public function index()
    {
        return view('admin.profesionales.index');
    }

    public function create()
    {
        return view('admin.profesionales.create'); 
    }

    public function store(ValidarProfesionalRequest $request)
    {
        $request['tipo_persona'] = "Profesional";
        $profesional = Persona::create($request->all());
        $request['persona_id'] = $profesional->id;
        $profesion = Profesion::create($request->all());
        $profesional->profesion;
        return redirect()->route('admin.prof.edit',[$profesional])->with('mensaje', 'Se creo el profesional correctamente');
    }

    public function show(Persona $profesionale)
    {
        $profesionale->profesion;
        return view('admin.profesionales.show', compact('profesionale')); 
    }

    public function edit(Persona $profesionale)
    {
        $profesionale->profesion;
        return view('admin.profesionales.edit', compact('profesionale')); 
    }

    public function update(ValidarProfesionalRequest $request, Persona $profesionale)
    {
        $profesionale->update($request->all());
        $profesion = $profesionale->profesion;
        $profesion->update($request->all());
        session(['mensaje' => 'El registro se actualizado correctamente.']);
        return redirect()->route('admin.prof.edit', [$profesionale]);
    }

    public function destroy(Persona $profesionale)
    {
        $profesionale->delete();
        session(['mensaje' => 'El registro ha sido borrado correctamente.']);
        return redirect()->route('admin.prof.index');
    }
}
