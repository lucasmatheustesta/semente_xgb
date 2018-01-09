<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Paciente;

class PacienteRequest extends FormRequest
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
            'name.required'         => 'Digite o Nome do Paciente',
            'name.min'              => 'Digite pelo menos 3 caracteres no campo Nome',
            'email.min'             => 'Digite pelo menos 3 caracteres no campo E-mail',
            'email.email'           => 'Digite um e-mail válido',
            'image.mimes'        => 'Envie o logotipo com uma das seguintes extensões: JPEG, JPG ou PNG',
            'estado_id.required'    => 'Selecione um Estado',
            'cidade_id.required'    => 'Selecione uma Cidade',            
            'consultor_id.required'    => 'Selecione um Consultor',            
            'clinica_id.required'    => 'Selecione uma Clínica',            
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Paciente $paciente)
    {
        $id = \Route::current()->getParameter('id');
        $paciente = Paciente::find($id);

        switch($this->method()){
            case 'GET':
            case 'DELETE': {
                return [];
            }
            case 'POST': {
               return [
                    'name'          => 'required|min:3',
                    'email'         => 'email',
                    'image'         => 'mimes:jpeg,jpg,png',
                    'estado_id'     => 'required',
                    'cidade_id'     => 'required',
                    'consultor_id'     => 'required',
                    'clinica_id'     => 'required',
                ];
            }
            case 'PUT':
            case 'PATCH':{
                return [
                    'name'          => 'required|min:3',
                    'email'         => 'email',
                    'image'         => 'mimes:jpeg,jpg,png',
                    'estado_id'     => 'required',
                    'cidade_id'     => 'required',
                    'consultor_id'     => 'required',
                    'clinica_id'     => 'required',
                ];
            }
            default:break;
        }

    }
}
