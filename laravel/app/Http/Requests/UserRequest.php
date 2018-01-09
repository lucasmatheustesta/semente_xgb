<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserRequest extends FormRequest
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
            'name.required'         => 'Digite seu Nome',
            'name.min'              => 'Digite pelo menos 3 caracteres no campo Nome',
            'email.required'        => 'Digite um E-mail para acesso',
            'email.min'             => 'Digite pelo menos 3 caracteres no campo E-mail',
            'email.email'           => 'Digite um e-mail válido',
            'email.unique'          => 'Este E-mail já está cadastrado em nosso sistema',
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
    public function rules(User $user)
    {
        $user = User::find(Auth::user()->id);
        if (isset($user->roles[0]->name) and !empty($user->roles[0]->name) and $user->roles[0]->name == 'clinica') {
             return [
                'name'          => 'required|min:3',
                'email'         => 'required|email|unique:users,email,'.$user->id,
                'estado_id'     => 'required',
                'cidade_id'     => 'required',
            ];
        }
        elseif (isset($user->roles[0]->name) and !empty($user->roles[0]->name) and $user->roles[0]->name == 'consultor') {
            return [
                'name'          => 'required|min:3',
                'email'         => 'required|email|unique:users,email,'.$user->id,
                'estado_id'     => 'required',
                'cidade_id'     => 'required',
            ];
        }
        else{
            return [
                'name'          => 'required|min:3',
                'email'         => 'required|email|unique:users,email,'.$user->id,
            ];
        }

    }
}
