<?php

namespace App\Http\Controllers;

use App\Models\AvisosCobro;
use App\Models\Pago;
use App\Models\Sesion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
}
