<?php

namespace App\Http\Controllers\Psicologo;

use App\Http\Controllers\Controller;
use App\Models\InformeTaller;
use Illuminate\Http\Request;

class InformeTallerController extends Controller
{
    public function guardarInformeTaller(Request $request, $taller)
    {
        InformeTaller::create($request->all());
        return redirect()->route('psico.taller.control.alumnos.index', [$taller])->with('mensaje', 'Se creó el informe del taller correctamente');      
    }

    public function informeTallerEdit(InformeTaller $informe)
    {
        $taller = $informe->taller()->first();
        return view('psico.talleres.informes.edit_informe')->with(compact('taller', 'informe'));
    }

    public function informeTallerUpdate(Request $request, InformeTaller $informe)
    {
        // dd($request->all());
        $informe->update($request->all());
        return redirect()->route('psico.taller.edit.informe', [$informe])->with('mensaje', 'Se actualizó el informe del taller correctamente');
    }

    public function informeTallerVer(InformeTaller $informe)
    {
        $taller = $informe->taller()->first();
        return view('psico.talleres.informes.ver_informe_talleres')->with(compact('taller', 'informe'));;
    }
}
