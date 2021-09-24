<?php

namespace App\Http\Controllers;

use App\Models\AvisosCobro;
use App\Models\DatosGenerales;
use App\Models\Matricula;
use App\Models\Tarifa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AvisosCobroController extends Controller
{
    public function crearAvisoCobro(Matricula $matricula)
    {
        $matricula->alumno;
        // $tarifas = Tarifa::where('estado','1')->get()->pluck('nombre','id');
        $tarifas = Tarifa::where('estado','1')->selectRaw('concat(nombre, " - ", CAST(monto AS DECIMAL(8,2))) as tarifa, id')->get()->pluck('tarifa','id')->toArray();
        $tarifas = ['' => 'Seleccionar'] + $tarifas;
        $cbxMeses = DatosGenerales::where('activo', '1')->where('tipo','meses')->get()->pluck('valor','valor');
        return view('director.avisos_cobro.create')->with(compact('matricula','tarifas','cbxMeses'));
    }

    public function guardarAvisoCobro(Request $request, Matricula $matricula)
    {
        $reglas = [
            'tarifa_id' => 'required|numeric|gt:0',
            'matricula_id' => 'required|numeric|gt:0',
        ];
        $mensajes = [
            'tarifa_id.gt' => 'Debe Seleccionar un alumno',
            'matricula_id.gt' => 'Debe seleccionar una tarifa.',
            'tarifa_id.required' => 'Seleccione una tarifa',
        ];

        Validator::make($request->all(), $reglas, $mensajes)->validate();
        $tarifa = Tarifa::find($request->get('tarifa_id'));
        $request['importe'] = $tarifa->monto;
        $mes = $request->get('mes');
        $request['mes'] = $mes;
        $request['concepto'] = ($mes == "Ninguno")?$tarifa->descripcion.' gestión '.$matricula->gestion:$tarifa->descripcion .' Pago del mes de ' .$mes.' gestión '.$matricula->gestion;
        $request['fecha'] = now();
        $alumno = $matricula->alumno;
        AvisosCobro::create($request->all());
        return redirect()->route('director.matricula.cuenta.alumno',[$alumno]);
    }

    public function eliminarAvisoCobro(AvisosCobro $avisoCobro)
    {
        $avisoCobro->matricula;
        $avisoCobro->matricula->alumno;
        return view('director.avisos_cobro.delete')->with(compact('avisoCobro'));
    }
    public function eliminarAvisoCobroDelete(Request $request, AvisosCobro $avisoCobro)
    {
        $matricula = Matricula::find($request->get('matricula_id'));
        $avisoCobro->motivo_eliminado = $request->get('motivo_eliminado');
        $avisoCobro->fecha_eliminado = now();
        $avisoCobro->user_eliminado_id = Auth::user()->id;
        $avisoCobro->eliminado = 1;
        $avisoCobro->save();
        return redirect()->route('director.matricula.cuenta.alumno',[$matricula->alumno->id]);
    }
}
