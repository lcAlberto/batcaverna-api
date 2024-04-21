<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SquadRequest extends FormRequest
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
            'name' => ['required', $this->method() == 'PUT' ? 'sometimes' : 'unique:squads,name'],
            'description' => ['required', 'string'],
            'objectives' => ['required', 'string'],
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'nome',
            'description' => 'descrição',
            'objectives' => 'objetivos',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O campo nome é obrigatório',
            'name.unique' => 'O campo nome deve ser único',
            'description.required' => 'O campo descrição é obrigatório',
            'objectives.required' => 'O campo objetivo é obrigatório',
        ];
    }
}
