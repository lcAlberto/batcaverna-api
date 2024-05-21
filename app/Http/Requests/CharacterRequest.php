<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CharacterRequest extends FormRequest
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
            'codename' => ['required', $this->method() == 'PUT' ? 'sometimes' : 'unique:characters,codename'],
            'sex' => 'required|string',
            'age' => 'required|string',
            'avatar' => 'nullable|file|mimes:jpeg,bmp,png,webp',
            'weakness' => 'string',
            'skills' => 'nullable',
            'color' => 'string',
            'affiliate' => 'string',
            'pair' => 'string',
            'planet' => 'string',
            'city' => 'string',
            'team' => 'string',
            'team_id' => 'required'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'nome',
            'codename' => 'codenome',
            'sex' => 'sexo',
            'age' => 'idade',
            'avatar' => 'avatar',
            'weakness' => 'fraqueza',
            'skils' => 'habilidade',
            'color' => 'cor',
            'affiliate' => 'afiliado',
            'pair' => 'par',
            'planet' => 'planeta',
            'city' => 'cidade',
            'team_id' => 'equipe',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nome é obrigatório',
            'name.unique' => 'O campo nome deve ser único',
            'codename.required' => 'Codinome é obrigatório',
            'codename.unique' => 'Codinome deve ser obrigatório',
            'sex.required' => 'O campo sexo é obrigatório',
            'age.required' => 'O Idade sexo é obrigatório',
            'avatar.string' => 'Carregue uma imagem válida',
            'weakness.string' => 'O Fraqueza sexo é inválido',
            'skils.string' => 'O campo Habilidade é inválido',
            'color.string' => 'O campo sexo é inválido',
            'affiliate.string' => 'O campo Afiliado é inválido',
            'pair.string' => 'O campo Par é inválido',
            'city.string' => 'O campo Cidade é inválido',
            'team_id.required' => 'O campo Time é obrigatório',
        ];
    }
}
