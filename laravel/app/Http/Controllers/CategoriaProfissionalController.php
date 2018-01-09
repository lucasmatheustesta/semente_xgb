<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoriaProfissionalRequest;
use Illuminate\Support\Facades\Auth;
use App\CategoriaProfissional;
use App\State;
use App\User;
use App\RoleUser;
use Gate;
use Image;
use PDF;

class CategoriaProfissionalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {

        if (Gate::denies('view_categoriaprofissional'))
            abort(403, 'Você não possui permissão para acessar essa página');
        
        $busca          = $request->input('query');
        $registros      = CategoriaProfissional::paginate(20);

        if (isset($busca) and !empty($busca)){
            $registros = CategoriaProfissional::where('nome', 'LIKE', "%$busca%")->paginate(20);
        }

        $type = $this->getTypeUser();
        return view('categoriasprofissional.index', compact('registros', 'type'));
    }

    public function adicionar()
    {
        if (Gate::denies('add_categoriaprofissional'))
            abort(403, 'Você não possui permissão para acessar essa página');

        $estados    = State::all();
        $type = $this->getTypeUser();

        return view('categoriasprofissional.adicionar', compact('estados', 'type'));
    }

    public function salvar(CategoriaProfissionalRequest $req)
    {
        if (Gate::denies('add_categoriaprofissional'))
            abort(403, 'Você não possui permissão para acessar essa página');

        $dados = $req->all();
        $type = $this->getTypeUser();

        $registro = CategoriaProfissional::create($dados);
        $req->session()->flash('success', 'Categoria Profissional cadastrada com sucesso!');
        return redirect()->route('categoriasprofissional');
    }

    public function editar($id)
    {
        if (Gate::denies('edit_categoriaprofissional'))
            abort(403, 'Você não possui permissão para acessar essa página');

        $registro   = CategoriaProfissional::find($id);
        $estados    = State::all();
        $type       = $this->getTypeUser();

        return view('categoriasprofissional.editar', compact('registro', 'type', 'estados'));
    }

    public function atualizar(CategoriaProfissionalRequest $req, $id)
    {
        if (Gate::denies('edit_categoriaprofissional'))
            abort(403, 'Você não possui permissão para acessar essa página');

        $dados      = $req->all();
        $registro    = CategoriaProfissional::find($id);
        $registro->update($dados);

        $req->session()->flash('success', 'Categoria Profissional atualizada com sucesso!');
        return redirect()->route('categoriasprofissional');
    }

    public function deletar($id)
    {
        if (Gate::denies('delete_categoriaprofissional'))
            abort(403, 'Você não possui permissão para acessar essa página');

        $registro = CategoriaProfissional::find($id);
        $registro->delete($id);
        
        return response()->json(['success' => true, 'message' => 'Categoria Profissional excluída com sucesso!']);
    }

}