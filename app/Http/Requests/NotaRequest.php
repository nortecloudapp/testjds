<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NotaRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'ncurso_id' => 'required|numeric|exists:ncursos,id',
            'user_id' => 'required|numeric|exists:users,id',
            'nro_nota' => 'required',
        ];
    }
}
