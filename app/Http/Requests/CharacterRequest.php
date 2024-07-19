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
            'avatar' => 'nullable|string',
            // 'avatar' => 'nullable|file|mimes:jpeg,bmp,png,webp',
            'weakness' => 'nullable|array|min:1',
            'weakness*' => 'string|distinct',
            'skills' => 'required|array|min:1',
            'skills*' => 'string|distinct',
            'color' => 'string',
            'affiliate' => 'string',
            'pair' => 'string',
            'planet' => 'string',
            'city' => 'string',
            'team' => 'required',
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
            'name.required' => 'O campo nome é obrigatório',
            'name.unique' => 'O campo nome deve ser único',
            'codename.required' => 'O campo codinome é obrigatório',
            'codename.unique' => 'O campo codinome deve ser obrigatório',
            'sex.required' => 'O campo sexo é obrigatório',
            'age.required' => 'O campo idade é obrigatório',
            'avatar.string' => 'Carregue uma imagem válida',
            'weakness.string' => 'O campo fraqueza é inválido',
            'skils.string' => 'O campo habilidade é inválido',
            'color.string' => 'O campo cor é inválido',
            'affiliate.string' => 'O campo afiliado é inválido',
            'pair.string' => 'O campo par é inválido',
            'city.string' => 'O campo cidade é inválido',
            'team_id.required' => 'O campo equipe é obrigatório',
        ];
    }
}
