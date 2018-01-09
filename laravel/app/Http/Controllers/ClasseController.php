<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClasseRequest;
use Illuminate\Support\Facades\Auth;
use App\Classe;
use App\School;
use App\Year;
use App\State;
use Gate;

class ClasseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        //if (Gate::denies('view_classe'))
        //    abort(403, 'Você não possui permissão para acessar essa página');

        $busca          = $request->input('query');
        $registros      = Classe::paginate(20);

        if (isset($busca) and !empty($busca)){
            $registros = Classe::where('title', 'LIKE', "%$busca%")->paginate(20);
        }

    	return view('classes.index', compact('registros'));
    }

    public function adicionar()
    {
        //if (Gate::denies('add_classe'))
        //    abort(403, 'Você não possui permissão para acessar essa página');

    	$schools 	= School::all();
    	$years 	    = Year::all();

    	return view('classes.adicionar', compact('schools', 'years'));
    }

    public function salvar(ClasseRequest $req)
    {
        if (Gate::denies('add_classe'))
            abort(403, 'Você não possui permissão para acessar essa página');

        $dados = $req->all();
        Classe::create($dados);

        $req->session()->flash('success', 'Classe cadastrada com sucesso!');
    	return redirect()->route('classes');
    }

    public function editar($id)
    {
        // if (Gate::denies('edit_classe'))
        //    abort(403, 'Você não possui permissão para acessar essa página');

    	$registro 	= Classe::find($id);
        $schools 	= School::all();
        $years 	    = Year::all();

    	return view('classes.editar', compact('registro', 'schools', 'years'));
    }

    public function atualizar(SchoolRequest $req, $id)
    {
        if (Gate::denies('edit_classe'))
            abort(403, 'Você não possui permissão para acessar essa página');

    	$dados      = $req->all();
        $registro   = Classe::find($id);
    	$registro->update($dados);

        $req->session()->flash('success', 'Classe atualizada com sucesso!');
    	return redirect()->route('classes');
    }

    public function deletar($id)
    {
        if (Gate::denies('delete_classe'))
            abort(403, 'Você não possui permissão para acessar essa página');

        $registro = Classe::find($id);
        User::find($registro->user_id)->delete($registro->user_id);
        $registro->delete($id);
        
        return response()->json(['success' => true, 'message' => 'Classe excluída com sucesso!']);
    }
}