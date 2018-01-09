<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\YearRequest;
use Illuminate\Support\Facades\Auth;
use App\Year;
use Gate;

class YearController extends Controller
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
        $registros      = Year::paginate(20);

        if (isset($busca) and !empty($busca)){
            $registros = Year::where('name', 'LIKE', "%$busca%")->paginate(20);
        }

    	return view('years.index', compact('registros'));
    }

    public function adicionar()
    {
        //if (Gate::denies('add_classe'))
        //    abort(403, 'Você não possui permissão para acessar essa página');

    	return view('years.adicionar');
    }

    public function salvar(YearRequest $req)
    {
        //if (Gate::denies('add_classe'))
        //    abort(403, 'Você não possui permissão para acessar essa página');

        $dados = $req->all();
        Year::create($dados);

        $req->session()->flash('success', 'Ano cadastrado com sucesso!');
    	return redirect()->route('years');
    }

    public function editar($id)
    {
        // if (Gate::denies('edit_classe'))
        //    abort(403, 'Você não possui permissão para acessar essa página');

    	$registro 	= Year::find($id);

    	return view('years.editar', compact('registro'));
    }

    public function atualizar(YearRequest $req, $id)
    {
        //if (Gate::denies('edit_classe'))
        //    abort(403, 'Você não possui permissão para acessar essa página');

    	$dados      = $req->all();
        $registro   = Year::find($id);
    	$registro->update($dados);

        $req->session()->flash('success', 'Ano atualizado com sucesso!');
    	return redirect()->route('years');
    }

    public function deletar($id)
    {
        //if (Gate::denies('delete_year'))
        //    abort(403, 'Você não possui permissão para acessar essa página');

        $registro = Year::find($id);
        $registro->delete($id);
        
        return response()->json(['success' => true, 'message' => 'Ano excluído com sucesso!']);
    }
}