<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Auth;
use App\State;
use App\User;
use App\Clinica;
use App\Consultor;
use Gate;

class UserController extends Controller
{
    public function sair()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function perfil()
    {
        //$type       = $this->getTypeUser();
        $type       = 'Admin';

        ///if ($type == 'Admin') {
            $registro    = User::find(Auth::user()->id);
            return view('auth.perfil.admin', compact('type', 'registro'));
//        }
//        elseif ($type == 'Clínica') {
//            $estados    = State::all();
//            $registro   = Clinica::where('user_id', Auth::user()->id)->first();
//            return view('auth.perfil.clinica', compact('type', 'estados', 'registro'));
//        }
//        else{
//            $estados    = State::all();
//            $registro   = Consultor::where('user_id', Auth::user()->id)->first();
//            return view('auth.perfil.consultor', compact('type', 'estados', 'registro'));
//        }
    }

    public function atualizar(UserRequest $req)
    {
        if (Gate::denies('edit_perfil'))
            abort(403, 'Você não possui permissão para acessar essa página');

        $dados      = $req->all();
        $type       = $this->getTypeUser();
        $registro    = User::find(Auth::user()->id);

        $registro->update([
            'name' => $dados['name'],
        ]);

        if (isset($dados['password']) and !empty($dados['password']) and $dados['password'] != 'marcosferrarez') {
            $registro->update([
                'password' => bcrypt($dados['password']),
            ]);
        }

        if ($type == 'Clínica') {
            $clinica = Clinica::where('user_id', Auth::user()->id)->first();
            $clinica->update($dados);
        }
        elseif ($type == 'Consultor') {
            $consultor = Consultor::where('user_id', Auth::user()->id)->first();
            $consultor->update($dados);
        }

        if (isset($dados['slim']) and !empty($dados['slim'])) {
            $image = json_decode($dados['slim'], true);
            $file = $this->saveFile($image['output']['image'], $image['input']['name'], 'img/users/');
            $registro->update([
                'image' => $file['path']
            ]);
        }


        $req->session()->flash('success', 'Perfil atualizado com sucesso!');
        return redirect()->route('dashboard');
    }

    public function rolespermission()
    {
    	echo '<h1>'.auth()->user()->name.'</h1>';

    	foreach (auth()->user()->roles as $role) {
    		echo "<p>".$role->name."<p>";

    		$permissions = $role->permissions;

    		foreach ($permissions as $key => $permission) {
    			echo "<p><b>".$permission->name."</b></p>";
    		}
    	}
        return null;
    }
}
