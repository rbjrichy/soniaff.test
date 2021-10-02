<?php

namespace App\Http\Controllers\Director;

use App\Http\Controllers\Controller;
use App\Models\AvisosCobro;
use App\Models\DatosGenerales;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class ReportesPagosController extends Controller
{
    
    public function verReporteDeuda()
    {
        $gestion = null;
        $mes = null;
        $deudas = DB::table('avisos_cobros')
                    ->join('matriculas', 'avisos_cobros.matricula_id', '=', 'matriculas.id')
                    ->join('personas', 'matriculas.alumno_id', '=', 'personas.id')
                    ->where('avisos_cobros.eliminado', '0')
                    ->whereNull('avisos_cobros.pago_id')
                    ->select(DB::raw('sum(avisos_cobros.importe) as deuda'), 'matriculas.codigo', 'matriculas.gestion', 'personas.nombres', 'personas.apellidos', 'personas.direccion', 'personas.telefonos')
                    ->groupBy('matriculas.codigo', 'matriculas.gestion', 'personas.nombres', 'personas.apellidos', 'personas.direccion', 'personas.telefonos')
                    ->get();
        $gestiones = $this->getGestiones();
        $meses = $this->getMeses(); 
        session(['mensaje'=>'Reporte de todas las gestiones']);
        return view('director.reportes.reporte_deudas')->with(compact('deudas','gestiones','meses', 'gestion', 'mes'));
    }

    public function generarReporteDeuda(Request $request)
    {
        $gestion = $request->get('gestion');
        $mes = $request->get('mes');
        if ($gestion == 'Todas') {
            // dd($request->all());
            return redirect()->route('director.ver.reporte.deudas');
        }
        $deudas = DB::table('avisos_cobros')
                    ->join('matriculas', 'avisos_cobros.matricula_id', '=', 'matriculas.id')
                    ->join('personas', 'matriculas.alumno_id', '=', 'personas.id')
                    ->where('avisos_cobros.eliminado', '0')
                    ->whereNull('avisos_cobros.pago_id')
                    ->whereYear('avisos_cobros.fecha', $gestion)
                    ->whereMonth('avisos_cobros.fecha', $mes)
                    ->select(DB::raw('sum(avisos_cobros.importe) as deuda'), 'matriculas.codigo', 'matriculas.gestion', 'personas.nombres', 'personas.apellidos', 'personas.direccion', 'personas.telefonos')
                    ->groupBy('matriculas.codigo', 'matriculas.gestion', 'personas.nombres', 'personas.apellidos', 'personas.direccion', 'personas.telefonos')
                    ->get();
                    $gestiones = AvisosCobro::selectRaw('Year(fecha) as gestion')
                    ->groupBy('gestion')
                    ->pluck('gestion','gestion');
        $gestiones = $this->getGestiones();
        $meses = $this->getMeses(); 
        $fechaAux = Carbon::createFromDate($gestion,$mes,1);
        session(['mensaje'=>'Reporte de deudas de la gestión '. $gestion . ' del mes ' . $fechaAux->isoFormat('MMMM')]);
        return view('director.reportes.reporte_deudas')->with(compact('deudas','gestiones','meses', 'gestion', 'mes'));
    }

    private function getMeses()
    {
        return DatosGenerales::meses()
                            ->get()
                            ->pluck('valor','posicion')
                            ->toArray();
    }

    private function getGestiones()
    {
        $gestiones = AvisosCobro::selectRaw('Year(fecha) as gestion')
                                ->groupBy('gestion')
                                ->pluck('gestion','gestion');
        return ['Todas'=>'Todas'] + $gestiones->all();
    }

    public function verReporteIngresos()
    {
        $gestion = null;
        $mes = null;
        $ingresos = DB::table('avisos_cobros')
                    ->join('matriculas', 'avisos_cobros.matricula_id', '=', 'matriculas.id')
                    ->join('personas', 'matriculas.alumno_id', '=', 'personas.id')
                    ->where('avisos_cobros.eliminado', '0')
                    ->whereNotNull('avisos_cobros.pago_id')
                    ->select(DB::raw('sum(avisos_cobros.importe) as deuda'), 'matriculas.codigo', 'matriculas.gestion', 'personas.nombres', 'personas.apellidos', 'personas.direccion', 'personas.telefonos')
                    ->groupBy('matriculas.codigo', 'matriculas.gestion', 'personas.nombres', 'personas.apellidos', 'personas.direccion', 'personas.telefonos')
                    ->get();
        $gestiones = $this->getGestiones();
        $meses = $this->getMeses(); 
        session(['mensaje'=>'Reporte de todas las gestiones']);
        return view('director.reportes.reporte_ingresos')->with(compact('ingresos','gestiones','meses', 'gestion', 'mes'));
    }
    
    public function generarReporteIngresos(Request $request)
    {
        $gestion = $request->get('gestion');
        $mes = $request->get('mes');
        if ($gestion == 'Todas') {
            // dd($request->all());
            return redirect()->route('director.ver.reporte.ingresos');
        }
        $ingresos = DB::table('avisos_cobros')
                    ->join('matriculas', 'avisos_cobros.matricula_id', '=', 'matriculas.id')
                    ->join('personas', 'matriculas.alumno_id', '=', 'personas.id')
                    ->where('avisos_cobros.eliminado', '0')
                    ->whereNotNull('avisos_cobros.pago_id')
                    ->whereYear('avisos_cobros.fecha', $gestion)
                    ->whereMonth('avisos_cobros.fecha', $mes)
                    ->select(DB::raw('sum(avisos_cobros.importe) as deuda'), 'matriculas.codigo', 'matriculas.gestion', 'personas.nombres', 'personas.apellidos', 'personas.direccion', 'personas.telefonos')
                    ->groupBy('matriculas.codigo', 'matriculas.gestion', 'personas.nombres', 'personas.apellidos', 'personas.direccion', 'personas.telefonos')
                    ->get();
                    $gestiones = AvisosCobro::selectRaw('Year(fecha) as gestion')
                    ->groupBy('gestion')
                    ->pluck('gestion','gestion');
        $gestiones = $this->getGestiones();
        $meses = $this->getMeses(); 
        $fechaAux = Carbon::createFromDate($gestion,$mes,1);
        session(['mensaje'=>'Reporte de ingresos de la gestión '. $gestion . ' del mes ' . $fechaAux->isoFormat('MMMM')]);
        return view('director.reportes.reporte_ingresos')->with(compact('ingresos','gestiones','meses', 'gestion', 'mes'));
    }

}