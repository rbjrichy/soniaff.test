<?php

namespace App\Http\Controllers;

use App\Models\DatosGenerales;
use App\Models\Tarifa;
use Illuminate\Http\Request;

class TarifaController extends Controller
{
    public function tarifasIndex(Tarifa $tarifa=null)
    {

        $tarifas = Tarifa::orderByRaw('estado - tipo_tarifa desc')->get();
        $tiposTarifa = DatosGenerales::where('tipo','tipo_tarifa')->where('activo','1')->get()->pluck('valor','valor');
        return view('director.tarifas.index')->with(compact('tarifa','tarifas','tiposTarifa'));
    }

    public function updateTarifa(Request $request, Tarifa $tarifa=null)
    {
        // dd($tarifa);
        if (is_null($tarifa)) {
            // dd($request->all());
            $tarifa = Tarifa::create($request->all());
        }else
        {
            $tarifa->update($request->all());
        }
        return redirect()->route('director.gestionar.tarifa.index',[$tarifa]);
    }
}
