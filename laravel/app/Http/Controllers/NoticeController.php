<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\NoticeRequest;
use Illuminate\Support\Facades\Auth;
use App\Notice;
use Gate;

class NoticeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        //if (Gate::denies('view_notice'))
        //    abort(403, 'Você não possui permissão para acessar essa página');

        $busca          = $request->input('query');
        $registros      = Notice::paginate(20);

        if (isset($busca) and !empty($busca)){
            $registros = Notice::where('title', 'LIKE', "%$busca%")->paginate(20);
        }

    	return view('notices.index', compact('registros'));
    }

    public function adicionar()
    {
        //if (Gate::denies('add_notice'))
        //    abort(403, 'Você não possui permissão para acessar essa página');

    	return view('notices.adicionar');
    }

    public function salvar(NoticeRequest $req)
    {
        //if (Gate::denies('add_notice'))
        //    abort(403, 'Você não possui permissão para acessar essa página');

        $dados = $req->all();
        Notice::create($dados);

        $req->session()->flash('success', 'Aviso cadastrado com sucesso!');
    	return redirect()->route('notices');
    }

    public function editar($id)
    {
        // if (Gate::denies('edit_notice'))
        //    abort(403, 'Você não possui permissão para acessar essa página');

    	$registro 	= Notice::find($id);

    	return view('notices.editar', compact('registro'));
    }

    public function atualizar(NoticeRequest $req, $id)
    {
        //if (Gate::denies('edit_notice'))
        //    abort(403, 'Você não possui permissão para acessar essa página');

    	$dados      = $req->all();
        $registro    = Notice::find($id);

    	$registro->update($dados);

        $req->session()->flash('success', 'Aviso atualizado com sucesso!');
    	return redirect()->route('notices');
    }

    public function deletar($id)
    {
        //if (Gate::denies('delete_notice'))
        //    abort(403, 'Você não possui permissão para acessar essa página');

        $registro = Notice::find($id);
        $registro->delete($id);
        
        return response()->json(['success' => true, 'message' => 'Aviso excluído com sucesso!']);
    }
}