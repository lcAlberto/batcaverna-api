<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SquadCharacterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'hero_ids' => 'required|array',
            'hero_ids.*' => 'exists:characters,id',
        ];
    }

    public function attributes()
    {
        return [
            'hero_ids' => 'Lista dos heróis',
        ];
    }

    public function messages()
    {
        return [
            'hero_ids.required' => 'É necessário uma lista com os heróis para associar ao esquadrão',
        ];
    }
}
