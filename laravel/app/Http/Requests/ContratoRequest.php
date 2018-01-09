<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContratoRequest extends FormRequest
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
            'consultor_id.required'    => 'Selecione um Consultor',            
            'clinica_id.required'    => 'Selecione uma Clínica',            
            'paciente_id.required'    => 'Selecione um Paciente',            
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch($this->method()){
            case 'GET':
            case 'DELETE': {
                return [];
            }
            case 'POST': {
               return [
                    'consultor_id'     => 'required',
                    'clinica_id'     => 'required',
                    'paciente_id'     => 'required',
                ];
            }
            case 'PUT':
            case 'PATCH':{
                return [
                    'consultor_id'     => 'required',
                    'clinica_id'     => 'required',
                    'paciente_id'     => 'required',
                ];
            }
            default:break;
        }
    }
}
