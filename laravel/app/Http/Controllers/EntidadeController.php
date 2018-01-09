<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\EntidadeRequest;
use Illuminate\Support\Facades\Auth;
use App\Entidade;
use App\EntidadeClassificacao;
use App\TipoLogradouro;
use App\Pais;
use App\State;
use App\User;
use App\RoleUser;
use Gate;

class EntidadeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {

        if (Gate::denies('view_entidade'))
            abort(403, 'Você não possui permissão para acessar essa página');
        
        $busca          = $request->input('query');
        $estados        = State::all();
        $registros      = Entidade::paginate(20);

        if (isset($busca) and !empty($busca)){
            $registros = Entidade::where('nome', 'LIKE', "%$busca%")->paginate(20);
        }

        $type = $this->getTypeUser();
        return view('entidades.index', compact('registros', 'type', 'estados'));
    }

    public function adicionar()
    {
        if (Gate::denies('add_entidade'))
            abort(403, 'Você não possui permissão para acessar essa página');

        $estados            = State::all();
        $tipos      = TipoLogradouro::all();
        $paises      = Pais::all();
        $classificacoes     = EntidadeClassificacao::all();
        $type = $this->getTypeUser();

        return view('entidades.adicionar', compact('estados', 'type', 'classificacoes', 'tipos', 'paises'));
    }

    public function salvar(EntidadeRequest $req)
    {
        if (Gate::denies('add_entidade'))
            abort(403, 'Você não possui permissão para acessar essa página');

        $dados = $req->all();
        $type = $this->getTypeUser();

        $registro = Entidade::create($dados);
        $req->session()->flash('success', 'Entidade cadastrada com sucesso!');
        return redirect()->route('entidades');
    }

    public function editar($id)
    {
        if (Gate::denies('edit_entidade'))
            abort(403, 'Você não possui permissão para acessar essa página');

        $registro   = Entidade::find($id);
        $tipos      = TipoLogradouro::all();
        $estados    = State::all();
        $paises      = Pais::all();
        $type       = $this->getTypeUser();

        return view('entidades.editar', compact('registro', 'type', 'estados', 'tipos', 'paises'));
    }

    public function atualizar(PacienteRequest $req, $id)
    {
        if (Gate::denies('edit_entidade'))
            abort(403, 'Você não possui permissão para acessar essa página');

        $dados      = $req->all();
        $registro    = Entidade::find($id);
        $registro->update($dados);

        $req->session()->flash('success', 'Entidade atualizada com sucesso!');
        return redirect()->route('entidades');
    }

    public function deletar($id)
    {
        if (Gate::denies('delete_entidade'))
            abort(403, 'Você não possui permissão para acessar essa página');

        $registro = Entidade::find($id);
        $registro->delete($id);
        
        return response()->json(['success' => true, 'message' => 'Entidade excluída com sucesso!']);
    }

}