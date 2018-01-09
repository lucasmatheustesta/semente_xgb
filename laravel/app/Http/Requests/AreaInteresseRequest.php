<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\AreaInteresse;

class AreaInteresseRequest extends FormRequest
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
            'nome.required'         => 'Digite o Nome da Área de Interesse',
            'nome.min'              => 'Digite pelo menos 3 caracteres no campo Nome',
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
                    'nome'          => 'required|min:3'
                ];
            }
            case 'PUT':
            case 'PATCH':{
                return [
                    'nome'          => 'required|min:3'
                ];
            }
            default:break;
        }

    }
}
