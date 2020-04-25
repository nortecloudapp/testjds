<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CicloRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nro_ciclo' => 'required|numeric|unique:ciclos,nro_ciclo,' . $this->ciclo,
        ];
    }

    public function messages()
    {
        return [
            'nro_ciclo.required' => 'Ciclo es requerido',
            'nro_ciclo.numeric' => 'Ciclo debe ser un número',
        ];
    }
}
