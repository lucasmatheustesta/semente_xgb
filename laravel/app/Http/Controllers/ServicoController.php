<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ServicoRequest;
use App\Servico;
use Gate;

class ServicoController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        if (Gate::denies('view_servico'))
            abort(403, 'Você não possui permissão para acessar essa página');

    	$registros      = Servico::paginate(20);
        $tipo           = $request->input('tipo');
        $busca          = $request->input('query');

        if (isset($tipo) and !empty($tipo)){
            $registros = Servico::where('type', $tipo)->paginate(20);
        }

        if (isset($busca) and !empty($busca)){
            $registros = Servico::where('title', 'LIKE', "%$busca%")->paginate(20);
        }

        $type = $this->getTypeUser();

    	return view('servicos.index', compact('registros', 'type'));
    }

    public function adicionar()
    {
        if (Gate::denies('add_servico'))
            abort(403, 'Você não possui permissão para acessar essa página');

        $type = $this->getTypeUser();
    	return view('servicos.adicionar', compact('type'));
    }

    public function salvar(ServicoRequest $req)
    {
        if (Gate::denies('add_servico'))
            abort(403, 'Você não possui permissão para acessar essa página');

    	$dados = $req->all();
    	
    	Servico::create($dados);

        $req->session()->flash('success', 'Serviço cadastrado com sucesso!');
    	return redirect()->route('servicos');
    }

    public function editar($id)
    {
        if (Gate::denies('edit_servico'))
            abort(403, 'Você não possui permissão para acessar essa página');

    	$registro 	= Servico::find($id);
        $type = $this->getTypeUser();

    	return view('servicos.editar', compact('registro', 'type'));
    }

    public function tipo($id) {

        $registro   = Servico::find($id);

        if (isset($registro->type) and $registro->type == 'ortodontia')
        {
            $options = [];
            $options[1]['id'] = '1';
            $options[1]['name'] = '50% sobre a primeira e 100% sobre a 2ª e 3ª parcela';

            return response()->json(['success' => true, 'data' => $options, 'type' => 1]);
        }else{
            $options = [];
            $options[1]['id'] = '2';
            $options[1]['name'] = '10% sobre todas as parcelas';

            return response()->json(['success' => true, 'data' => $options, 'type' => 2]);
        }

        return response()->json(['success' => false]);
    }

    public function atualizar(ServicoRequest $req, $id)
    {
        if (Gate::denies('edit_servico'))
            abort(403, 'Você não possui permissão para acessar essa página');

    	$dados = $req->all();

    	Servico::find($id)->update($dados);

        $req->session()->flash('success', 'Serviço atualizado com sucesso!');
    	return redirect()->route('servicos');
    }

    public function deletar($id)
    {
        if (Gate::denies('delete_servico'))
            abort(403, 'Você não possui permissão para acessar essa página');

        Servico::find($id)->delete($id);
        
        return response()->json(['success' => true, 'message' => 'Serviço excluído com sucesso!']);
    }
}
