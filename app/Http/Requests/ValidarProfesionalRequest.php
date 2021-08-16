<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ValidarProfesionalRequest extends FormRequest
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
            'ci_nit' => [
                'numeric',
                'required',
                Rule::unique('personas', 'ci_nit')->ignore($this->route('profesionale'))
            ],
            'nombres'=> 'required|max:250',
            'apellidos'=> 'required|max:250',
            'direccion'=> 'nullable|max:250',
            'telefonos'=> 'nullable|max:100',
            'registro_profesional'=> 'required|max:50',
            'especialidad'=> 'required|max:250',
        ];
    }
}
