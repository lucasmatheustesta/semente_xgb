<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Consultor;

class ConsultorRequest extends FormRequest
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
            'name.required'         => 'Digite o Nome do Consultor',
            'name.min'              => 'Digite pelo menos 3 caracteres no campo Nome',
            'email.required'        => 'Digite um E-mail para acesso',
            'email.min'             => 'Digite pelo menos 3 caracteres no campo E-mail',
            'email.email'           => 'Digite um e-mail válido',
            'email.unique'          => 'Este E-mail já está cadastrado em nosso sistema',
            'password.required'     => 'Digite uma Senha para acesso',
            'image.mimes'        => 'Envie o logotipo com uma das seguintes extensões: JPEG, JPG ou PNG',
            'estado_id.required'    => 'Selecione um Estado',
            'cidade_id.required'    => 'Selecione uma Cidade',            
            'clinicas.required'    => 'Selecione uma ou mais Clínicas',            
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Consultor $consultor)
    {
        $id = \Route::current()->getParameter('id');
        $consultor = Consultor::find($id);

        switch($this->method()){
            case 'GET':
            case 'DELETE': {
                return [];
            }
            case 'POST': {
               return [
                    'name'          => 'required|min:3',
                    'email'         => 'required|email|unique:users,email',
                    'password'      => 'required',
                    'image'         => 'mimes:jpeg,jpg,png',
                    'estado_id'     => 'required',
                    'cidade_id'     => 'required',
                    'clinicas'     => 'required',
                ];
            }
            case 'PUT':
            case 'PATCH':{
                return [
                    'name'          => 'required|min:3',
                    'email'         => 'required|email|unique:users,email,'.$consultor->user_id,
                    'image'         => 'mimes:jpeg,jpg,png',
                    'estado_id'     => 'required',
                    'cidade_id'     => 'required',
                    'clinicas'     => 'required',
                ];
            }
            default:break;
        }

    }
}
