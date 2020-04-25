<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NcursoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre_curso' => 'required|unique:ncursos,nombre_curso,' . $this->ncurso,
            'ciclo_id' => 'required|numeric|exists:ciclos,id',
            'programa_id' => 'required|numeric|exists:programas,id',
        ];
    }
}
