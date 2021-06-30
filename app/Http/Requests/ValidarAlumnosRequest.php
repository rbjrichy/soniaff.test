<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidarAlumnosRequest extends FormRequest
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
        //
        return [
            // 'tipo_persona'=> 'required|max:20',
            'ci_nit'=> 'numeric|required|unique:personas,ci_nit,'.$this->route('alumno.id'),
            'nombres'=> 'required|max:250',
            'apellidos'=> 'required|max:250',
            'fecha_nac'=> 'date|nullable',
            'lugar_nac'=> 'nullable|max:250',
            'escolaridad'=> 'nullable|max:250',
            'direccion'=> 'nullable|max:250',
            'idioma'=> 'nullable|max:20',
            'genero'=> 'nullable|max:20',
            // 'ocupacion'=> 'nullable|max:250',
            'telefonos'=> 'nullable|max:100',
        ];
    }
}
