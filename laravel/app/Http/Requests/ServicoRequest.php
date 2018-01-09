<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServicoRequest extends FormRequest
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

    public function messages()
    {
        return[
            'title.required'     => 'Digite o Título do Serviço',
            'title.max'          => 'Digite apenas 255 caracteres no campo Título',
            'title.min'          => 'Digite pelo menos 3 caracteres no campo Título',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:255|min:3',
        ];
    }
}
