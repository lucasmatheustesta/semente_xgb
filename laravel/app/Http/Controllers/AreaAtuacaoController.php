<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AreaAtuacaoRequest;
use Illuminate\Support\Facades\Auth;
use App\AreaAtuacao;
use App\State;
use App\User;
use App\RoleUser;
use Gate;
use Image;
use PDF;

class AreaAtuacaoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {

        if (Gate::denies('view_areaatuacao'))
            abort(403, 'Você não possui permissão para acessar essa página');
        
        $busca          = $request->input('query');
        $registros      = AreaAtuacao::paginate(20);

        if (isset($busca) and !empty($busca)){
            $registros = AreaAtuacao::where('nome', 'LIKE', "%$busca%")->paginate(20);
        }

        $type = $this->getTypeUser();
        return view('areasatuacao.index', compact('registros', 'type'));
    }

    public function adicionar()
    {
        if (Gate::denies('add_areaatuacao'))
            abort(403, 'Você não possui permissão para acessar essa página');

        $estados    = State::all();
        $type = $this->getTypeUser();

        return view('areasatuacao.adicionar', compact('estados', 'type'));
    }

    public function salvar(AreaAtuacaoRequest $req)
    {
        if (Gate::denies('add_areaatuacao'))
            abort(403, 'Você não possui permissão para acessar essa página');

        $dados = $req->all();
        $type = $this->getTypeUser();

        $registro = AreaAtuacao::create($dados);
        $req->session()->flash('success', 'Area de Atuação cadastrada com sucesso!');
        return redirect()->route('areasatuacao');
    }

    public function editar($id)
    {
        if (Gate::denies('edit_areaatuacao'))
            abort(403, 'Você não possui permissão para acessar essa página');

        $registro   = AreaAtuacao::find($id);
        $estados    = State::all();
        $type       = $this->getTypeUser();

        return view('areasatuacao.editar', compact('registro', 'type', 'estados'));
    }

    public function atualizar(AreaAtuacaoRequest $req, $id)
    {
        if (Gate::denies('edit_areaatuacao'))
            abort(403, 'Você não possui permissão para acessar essa página');

        $dados      = $req->all();
        $registro    = AreaAtuacao::find($id);
        $registro->update($dados);

        $req->session()->flash('success', 'Area de Atuação atualizada com sucesso!');
        return redirect()->route('areasatuacao');
    }

    public function deletar($id)
    {
        if (Gate::denies('delete_areaatuacao'))
            abort(403, 'Você não possui permissão para acessar essa página');

        $registro = AreaAtuacao::find($id);
        $registro->delete($id);
        
        return response()->json(['success' => true, 'message' => 'Area de Atuação excluída com sucesso!']);
    }

}