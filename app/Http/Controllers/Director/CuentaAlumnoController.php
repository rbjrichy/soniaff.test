<?php

namespace App\Http\Controllers\Director;

use App\Http\Controllers\Controller;
use App\Models\Persona;
use Illuminate\Http\Request;

class CuentaAlumnoController extends Controller
{
    public function cuentaAlumno(Persona $alumno)
    {
        $matriculas = $alumno->matriculas();
        $matricula = $matriculas->orderBy('id','desc')->first();
        $avisosCobros = $matricula->avisosCobro()->with('tarifa:id,tipo_tarifa')->where('eliminado','0')->whereNull('pago_id')->get();
        $cuentasPagadas = $matricula->avisosCobro()->with('tarifa:id,tipo_tarifa')->where('eliminado','0')->whereNotNull('pago_id')->get();
        return view('director.cuenta_alumno.cuenta_alumno')->with(compact('alumno','matricula','avisosCobros','cuentasPagadas'));
    }
}
