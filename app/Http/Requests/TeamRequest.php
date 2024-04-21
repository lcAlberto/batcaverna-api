<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeamRequest extends FormRequest
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
            'name' => ['required', $this->method() == 'PUT' ? 'sometimes' : 'unique:characters,name'],
            'location' => ['required', 'string'],
            'image' => ['required', 'string'],
            'founded_date' => ['date'],
            'heroes'=> ['nullable', 'array'],
        ];
    }


    public function attributes()
    {
        return [
            'name' => 'nome',
            'location' => 'localização',
            'image' => 'imagem',
            'founded_date' => 'data de funcação',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O campo nome é obrigatório',
            'name.unique' => 'O campo nome deve ser único',
            'location.required' => 'O campo localização é obrigatório',
            'image.required' => 'O campo imagem é obrigatório',
            'founded_date.required' => 'O campo data de fundação é obrigatório',

            'team_id.required' => 'O campo Time é obrigatório',
        ];
    }
}
