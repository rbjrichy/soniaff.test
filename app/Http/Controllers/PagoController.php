<?php

namespace App\Http\Controllers;

use App\Models\AvisosCobro;
use App\Models\DatosGenerales;
use App\Models\Matricula;
use App\Models\Pago;
use App\Models\Persona;
use App\Models\Sesion;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Foreach_;

class PagoController extends Controller
{
    public function pagarCuentas(Request $request)
    {
        $cuentasxpagar = $request->get('cuentasPagar');
        if (is_null($cuentasxpagar)) {
            session(['mensaje-error' => 'Debe seleccionar una cuenta para ser pagada.']);
            return redirect()->route('director.matricula.cuenta.alumno',[$request->get('alumno_id')]);
        }
        $cuentasxpagar = AvisosCobro::find($cuentasxpagar);
        foreach ($cuentasxpagar as $cuenta) {
            $pago = new Pago;
            $pago->fecha_pago = now();
            $pago->monto_pago = $cuenta->importe;
            $pago->usuario_id = Auth::user()->id;
            $pago->save();
            $cuenta->pago_id = $pago->id;
            $cuenta->save();
        }
        return redirect()->route('director.matricula.cuenta.alumno',[$request->get('alumno_id')]);
    }

    public function pagosIndex()
    {
        $now = now();
        $mesesPagados = DB::table('avisos_cobros')
                          ->join('pagos','avisos_cobros.pago_id','=','pagos.id')
                          ->join('matriculas','avisos_cobros.matricula_id','=','matriculas.id')
                          ->where('matriculas.gestion', intval($now->format('Y')))
                          ->where('eliminado','0')
                          ->select('avisos_cobros.mes', DB::raw('count(*) as cantidad'))
                          ->groupBy('avisos_cobros.mes')
                          ->orderBy('avisos_cobros.fecha')
                          ->get();
        $avisosCobro = DB::table('avisos_cobros')
                          ->join('matriculas','avisos_cobros.matricula_id','=','matriculas.id')
                          ->where('matriculas.gestion', intval($now->format('Y')))
                          ->where('eliminado','0')
                          ->select('avisos_cobros.mes', DB::raw('count(*) as cantidad'))
                          ->groupBy('avisos_cobros.mes')
                          ->orderBy('avisos_cobros.fecha')
                          ->get();
        $meses = DatosGenerales::where('tipo', 'meses')->where('activo','1')->get()->pluck('valor','valor');
        Arr::pull($meses, 'Ninguno');
        // foreach ($mesesPagados as $value) {
        //     $fuera = Arr::pull($meses, $value->mes);
        //     // echo $fuera . '<br>';
        // }
        // dd($meses);
        $totalMatriculados = Matricula::where('gestion', intval($now->format('Y')))->where('estado','1')->get()->count();
        return view('director.pagos.index')->with(compact('avisosCobro','totalMatriculados','meses','mesesPagados'));
    }

    public function generarAvisosCobro(Request $request)
    {
        $num_meses = Config::get('constants.num_mes');
        $mes = $num_meses[$request->get('mes')];
        $fechaActual = now();
        $fechaAux = $fechaActual;
        $gestion = $fechaActual->year;
        if ($mes > $fechaActual->month) { //incluir >= para excluir el mes actual
            session(['msj-danger' => 'No puede crear avisos de cobro de meses posteriores al mes '. $fechaActual->isoFormat('MMMM')]);
            return redirect()->route('director.pagos.index');
        }
        $fechaAux->subMonth();
        // dd([$mes, $fechaAux->month]);
        if ($mes < $fechaAux->month) {
            session(['msj-danger' => 'No puede crear avisos de cobro de meses anteriores al mes '. $fechaAux->isoFormat('MMMM')]);
            return redirect()->route('director.pagos.index');
        }
        $ids_aviso_cobro_mes = AvisosCobro::where('mes','<>','Ninguno')
                                ->where('eliminado','0')
                                ->whereYear('fecha',$gestion)
                                ->whereMonth('fecha',$mes)
                                ->select('id','matricula_id')
                                ->get()
                                ->pluck('matricula_id', 'id')
                                ->toArray();
        // dd([$ids_aviso_cobro_mes->toSql(), $ids_aviso_cobro_mes->getBindings()]);
        $alumnosMatriculados =  Matricula::with('tarifaDefecto')
                                        ->whereNotIn('id',$ids_aviso_cobro_mes)
                                        ->where('estado','1')
                                        ->get();
        // dd([$mes,$gestion,$ids_aviso_cobro_mes,$alumnosMatriculados]);
        $cantidadAvisos = 0;
        // $aniomeshoy = intval($gestion)+intval($mes);
        foreach ($alumnosMatriculados as $matricula) {
            // dd([$aniomeshoy, $matricula->fecha_matriculacion,$gestion, $mes]);
            // dd(intval($matricula->fecha_matriculacion->format('Y')) + intval($matricula->fecha_matriculacion->format('m')));
            // $aniomesmatricula = intval($matricula->fecha_matriculacion->format('Y')) + intval($matricula->fecha_matriculacion->format('m'));
            // dd([$gestion,$mes,$fechaActual->day]);
            $aviso = new AvisosCobro;
            //generamos fecha del periodo de pago a partir del mes de pago
            $aviso->fecha = Carbon::createFromDate($gestion,$mes,$fechaActual->day);
            $aviso->importe = $matricula->tarifaDefecto->monto;
            $aviso->concepto = $matricula->tarifaDefecto->descripcion .' Pago del mes de ' .$request->get('mes').' gestión '.$gestion;
            $aviso->mes = $request->get('mes');
            $aviso->matricula_id = $matricula->id;
            $aviso->tarifa_id = $matricula->tarifaDefecto->id;
            $aviso->save();
            $cantidadAvisos++;
        }
        session(['msj-info' => 'Cantidad de avisos de cobro creados '.$cantidadAvisos]);
        return redirect()->route('director.pagos.index');

    }

    public function buscarAlumnoMatricula(Request $request)
    {
        $alumno = Persona::findOrFail($request->get('alumno_id'));
        return redirect()->route('director.matricula.cuenta.alumno',[$alumno]);
    }
}
