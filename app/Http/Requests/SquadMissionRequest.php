<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SquadMissionRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'squad_ids' => 'required|array',
            'squad_ids.*' => 'exists:missions,id',
        ];
    }

    public function attributes()
    {
        return [
            'squad_ids' => 'Lista de esquadrões',
        ];
    }

    public function messages()
    {
        return [
            'squad_ids.required' => 'É necessário uma lista com os esquadrões para associar a missão',
        ];
    }
}
