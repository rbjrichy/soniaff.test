<?php

namespace App\Http\Requests;

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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'actividades' => 'required',
            'objetivos'=> 'required',
            'materiales'=> 'required',
            'fecha'=> 'required|date|after:now',
            'taller_id'=> 'required',
        ];
    }
}
