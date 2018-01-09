<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AreaInteresseRequest;
use Illuminate\Support\Facades\Auth;
use App\AreaInteresse;
use App\State;
use App\User;
use App\RoleUser;
use Gate;
use Image;
use PDF;

class AreaInteresseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {

        if (Gate::denies('view_areainteresse'))
            abort(403, 'Você não possui permissão para acessar essa página');
        
        $busca          = $request->input('query');
        $registros      = AreaInteresse::paginate(20);

        if (isset($busca) and !empty($busca)){
            $registros = AreaInteresse::where('nome', 'LIKE', "%$busca%")->paginate(20);
        }

        $type = $this->getTypeUser();
        return view('areasinteresse.index', compact('registros', 'type'));
    }

    public function adicionar()
    {
        if (Gate::denies('add_areainteresse'))
            abort(403, 'Você não possui permissão para acessar essa página');

        $estados    = State::all();
        $type = $this->getTypeUser();

        return view('areasinteresse.adicionar', compact('estados', 'type'));
    }

    public function salvar(AreaInteresseRequest $req)
    {
        if (Gate::denies('add_areainteresse'))
            abort(403, 'Você não possui permissão para acessar essa página');

        $dados = $req->all();
        $type = $this->getTypeUser();

        $registro = AreaInteresse::create($dados);
        $req->session()->flash('success', 'Área de Interesse cadastrada com sucesso!');
        return redirect()->route('areasinteresse');
    }

    public function editar($id)
    {
        if (Gate::denies('edit_areainteresse'))
            abort(403, 'Você não possui permissão para acessar essa página');

        $registro   = AreaInteresse::find($id);
        $estados    = State::all();
        $type       = $this->getTypeUser();

        return view('areasinteresse.editar', compact('registro', 'type', 'estados'));
    }

    public function atualizar(AreaInteresseRequest $req, $id)
    {
        if (Gate::denies('edit_areainteresse'))
            abort(403, 'Você não possui permissão para acessar essa página');

        $dados      = $req->all();
        $registro    = AreaInteresse::find($id);
        $registro->update($dados);

        $req->session()->flash('success', 'Área de Interesse atualizada com sucesso!');
        return redirect()->route('areasinteresse');
    }

    public function deletar($id)
    {
        if (Gate::denies('delete_areainteresse'))
            abort(403, 'Você não possui permissão para acessar essa página');

        $registro = AreaInteresse::find($id);
        $registro->delete($id);
        
        return response()->json(['success' => true, 'message' => 'Regional excluída com sucesso!']);
    }

}