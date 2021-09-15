<?php

namespace App\Http\Requests;

use App\Models\Sesion;
use Illuminate\Foundation\Http\FormRequest;

class ValidarSesionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function fechaAnterior()
    {
        // dd($this);
        $fecha = Sesion::latest('fecha')->where('taller_id',$this->route('taller'))->first()->fecha;
        if(is_null($fecha))
            $fecha = now();
        return $fecha;
    }

    public function rules()
    {
        return [
            'numero_sesion' => 'required',
            'duracion' => 'required',
            'actividades' => 'required',
            'objetivos'=> 'required',
            'materiales'=> 'required',
            // 'fecha'=> 'required|date|after:'.$this->fechaAnterior(), //fecha despues de la ulima sesion programada
            // 'fecha'=> 'required|date|after:tomorrow', //fecha despues de mañana
            'fecha_hora'=> 'required|date|after:now',
            'taller_id'=> 'required',
        ];
    }
}
