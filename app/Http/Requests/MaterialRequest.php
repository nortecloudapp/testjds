<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MaterialRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'ncurso_id' => 'required|exists:ncursos,id',
            'tag' => 'required|max:20|unique:materials,tag,' . $this->material,
            'url' => 'required|url|unique:materials,url,' . $this->material,
        ];
    }

    public function messages()
    {
        return [
            'tag.required' => 'Tag es requerido',
            'url.required' => 'Url es requerido',
            'url.url' => 'Debe insertar una URL válida'
        ];
    }
}
