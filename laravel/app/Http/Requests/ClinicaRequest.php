<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Clinica;

class ClinicaRequest extends FormRequest
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
            'name.required'         => 'Digite o Nome da Clínica',
            'name.min'              => 'Digite pelo menos 3 caracteres no campo Nome',
            'email.required'        => 'Digite um E-mail para acesso',
            'email.min'             => 'Digite pelo menos 3 caracteres no campo E-mail',
            'email.email'           => 'Digite um e-mail válido',
            'email.unique'          => 'Este E-mail já está cadastrado em nosso sistema',
            'password.required'     => 'Digite uma Senha para acesso',
            'image.mimes'           => 'Envie o logotipo com uma das seguintes extensões: JPEG, JPG ou PNG',
            'estado_id.required'    => 'Selecione um Estado',
            'cidade_id.required'    => 'Selecione uma Cidade',
            'responsavel.required'  => 'Digite o Nome do Reposável pela Clínica',
            'responsavel.min'       => 'Digite pelo menos 3 caracteres no campo Reposável',
            'cpf_cnpj.required'     => 'Digite o CPF/CNPJ do Reponsável pela Clínica',
            'cpf_cnpj.min'          => 'Digite pelo menos 3 caracteres no campo CPF/CNPJ',
            'rg.required'           => 'Digite o RG do Reponsável pela Clínica',
            'rg.min'                => 'Digite pelo menos 3 caracteres no campo RG',
            'estador_id.required'    => 'Selecione o Estado do endereço residencial',
            'cidader_id.required'    => 'Selecione a Cidade do endereço residencial',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Clinica $clinica)
    {
        $id = \Route::current()->getParameter('id');
        $clinica = Clinica::find($id);

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
                    'responsavel'   => 'required|min:3',
                    'cpf_cnpj'      => 'required|min:3',
                    'rg'      => 'required|min:3',
                ];
            }
            case 'PUT':
            case 'PATCH':{
                return [
                    'name'          => 'required|min:3',
                    'email'         => 'required|email|unique:users,email,'.$clinica->user_id,
                    'image'         => 'mimes:jpeg,jpg,png',
                    'estado_id'     => 'required',
                    'cidade_id'     => 'required',
                    'responsavel'   => 'required|min:3',
                    'cpf_cnpj'      => 'required|min:3',
                    'rg'            => 'required|min:3',
                ];
            }
            default:break;
        }

    }
}
