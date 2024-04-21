<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MissionRequest extends FormRequest
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
            'name' => ['required', $this->method() == 'PUT' ? 'sometimes' : 'unique:missions,name'],
            'coordinates' => ['required', 'string'],
            'urgency_level' => ['required', 'string'],
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'nome',
            'coordinates' => 'coordenadas',
            'urgency_level' => 'urgência',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O campo nome é obrigatório',
            'name.unique' => 'O campo nome deve ser único',
            'coordinates.required' => 'O campo coordenadas é obrigatório',
            'urgency_level.required' => 'O campo urgência é obrigatório',
        ];
    }
}
