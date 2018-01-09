<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\EspecialidadeRequest;
use Illuminate\Support\Facades\Auth;
use App\Especialidade;
use App\State;
use App\User;
use App\RoleUser;
use Gate;
use Image;
use PDF;

class EspecialidadeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {

        if (Gate::denies('view_especialidade'))
            abort(403, 'Você não possui permissão para acessar essa página');
        
        $busca          = $request->input('query');
        $registros      = Especialidade::paginate(20);

        if (isset($busca) and !empty($busca)){
            $registros = Especialidade::where('nome', 'LIKE', "%$busca%")->paginate(20);
        }

        $type = $this->getTypeUser();
        return view('especialidades.index', compact('registros', 'type'));
    }

    public function adicionar()
    {
        if (Gate::denies('add_especialidade'))
            abort(403, 'Você não possui permissão para acessar essa página');

        $estados    = State::all();
        $type = $this->getTypeUser();

        return view('especialidades.adicionar', compact('estados', 'type'));
    }

    public function salvar(EspecialidadeRequest $req)
    {
        if (Gate::denies('add_especialidade'))
            abort(403, 'Você não possui permissão para acessar essa página');

        $dados = $req->all();
        $type = $this->getTypeUser();

        $registro = Especialidade::create($dados);
        $req->session()->flash('success', 'Especialidade cadastrada com sucesso!');
        return redirect()->route('especialidades');
    }

    public function editar($id)
    {
        if (Gate::denies('edit_especialidade'))
            abort(403, 'Você não possui permissão para acessar essa página');

        $registro   = Especialidade::find($id);
        $estados    = State::all();
        $type       = $this->getTypeUser();

        return view('especialidades.editar', compact('registro', 'type', 'estados'));
    }

    public function atualizar(EspecialidadeRequest $req, $id)
    {
        if (Gate::denies('edit_especialidade'))
            abort(403, 'Você não possui permissão para acessar essa página');

        $dados      = $req->all();
        $registro    = Especialidade::find($id);
        $registro->update($dados);

        $req->session()->flash('success', 'Especialidade atualizada com sucesso!');
        return redirect()->route('especialidades');
    }

    public function deletar($id)
    {
        if (Gate::denies('delete_especialidade'))
            abort(403, 'Você não possui permissão para acessar essa página');

        $registro = Especialidade::find($id);
        $registro->delete($id);
        
        return response()->json(['success' => true, 'message' => 'Especialidade excluída com sucesso!']);
    }

}