<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReceitaRequest extends FormRequest
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
            'valor.required'            => 'Digite um valor para a receita',            
            'user_id.required'          => 'Selecione um usuário',            
            'data_cobranca.required'    => 'Digite uma data de pagamento',            
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
            'valor'         => 'required',
            'user_id'       => 'required',
            'data_cobranca' => 'required',
        ];
    }
}
