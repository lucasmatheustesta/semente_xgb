<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SchoolRequest;
use Illuminate\Support\Facades\Auth;
use App\School;
use App\State;
use App\User;
use App\RoleUser;
use Gate;
use Image;
use PDF;

class SchoolController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        //if (Gate::denies('view_school'))
        //    abort(403, 'Você não possui permissão para acessar essa página');

        $busca          = $request->input('query');
        $registros      = School::paginate(20);

        if (isset($busca) and !empty($busca)){
            $registros = School::join('users', 'users.id', '=', 'schools.user_id')
            ->where('users.name', 'LIKE', "%$busca%")->paginate(20);
        }

    	return view('schools.index', compact('registros'));
    }

    public function adicionar()
    {
        //if (Gate::denies('add_school'))
        //    abort(403, 'Você não possui permissão para acessar essa página');

    	$estados 	= State::all();

    	return view('schools.adicionar', compact('estados'));
    }

    public function salvar(SchoolRequest $req)
    {
        if (Gate::denies('add_school'))
            abort(403, 'Você não possui permissão para acessar essa página');

        $dados = $req->all();

        if (isset($dados['slim']) and !empty($dados['slim'])) {
            $image = json_decode($dados['slim'], true);
            $file = $this->saveFile($image['output']['image'], $image['input']['name'], 'img/users/');
            $dados['image'] = $file['path'];
        }else{
            $dados['image'] = null;
        }

        School::create($dados);

        $req->session()->flash('success', 'Escola cadastrada com sucesso!');
    	return redirect()->route('schools');
    }

    public function editar($id)
    {
        // if (Gate::denies('edit_school'))
        //    abort(403, 'Você não possui permissão para acessar essa página');

    	$registro 	= School::find($id);
    	$estados 	= State::all();

    	return view('schools.editar', compact('registro', 'estados'));
    }

    public function atualizar(SchoolRequest $req, $id)
    {
        if (Gate::denies('edit_school'))
            abort(403, 'Você não possui permissão para acessar essa página');

    	$dados      = $req->all();
        $registro    = School::find($id);

        if (isset($dados['slim']) and !empty($dados['slim'])) {
            $image = json_decode($dados['slim'], true);
            $file = $this->saveFile($image['output']['image'], $image['input']['name'], 'img/users/');
            $user->update([
                'image' => $file['path'],
            ]);
        }

    	$registro->update($dados);

        $req->session()->flash('success', 'Escola atualizada com sucesso!');
    	return redirect()->route('schools');
    }

    public function deletar($id)
    {
        if (Gate::denies('delete_school'))
            abort(403, 'Você não possui permissão para acessar essa página');

        $registro = School::find($id);
        User::find($registro->user_id)->delete($registro->user_id);
        $registro->delete($id);
        
        return response()->json(['success' => true, 'message' => 'Escola excluída com sucesso!']);
    }
}