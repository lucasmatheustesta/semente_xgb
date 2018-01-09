<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LocalTrabalhoRequest;
use Illuminate\Support\Facades\Auth;
use App\LocalTrabalho;
use App\TipoLocalTrabalho;
use App\ContatoLocalTrabalho;
use App\TipoLogradouro;
use App\Contato;
use App\State;
use App\Pais;
use App\User;
use App\RoleUser;
use Gate;
use Image;
use PDF;

class LocalTrabalhoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {

        if (Gate::denies('view_localtrabalho'))
            abort(403, 'Você não possui permissão para acessar essa página');
        
        $busca          = $request->input('query');
        $registros      = LocalTrabalho::paginate(20);

        if (isset($busca) and !empty($busca)){
            $registros = LocalTrabalho::where('nome', 'LIKE', "%$busca%")->paginate(20);
        }

        $type = $this->getTypeUser();
        return view('locaistrabalho.index', compact('registros', 'type'));
    }

    public function adicionar()
    {
        if (Gate::denies('add_localtrabalho'))
            abort(403, 'Você não possui permissão para acessar essa página');

        $estados           = State::all();
        $paises            = Pais::all();
        $tipos             = TipoLogradouro::all();
        $tipos_locais      = TipoLocalTrabalho::all();
        $type = $this->getTypeUser();

        return view('locaistrabalho.adicionar', compact('estados', 'type', 'tipos', 'paises', 'tipos_locais'));
    }

    public function salvar(LocalTrabalhoRequest $req)
    {
        if (Gate::denies('add_localtrabalho'))
            abort(403, 'Você não possui permissão para acessar essa página');

        $dados = $req->all();
        $type = $this->getTypeUser();
        $registro = LocalTrabalho::create($dados);

        $this->insertContatos($registro->id, $dados['contatos']);

        $req->session()->flash('success', 'Local de Trabalho cadastrado com sucesso!');
        return redirect()->route('locaistrabalho');
    }

    public function editar($id)
    {
        if (Gate::denies('edit_localtrabalho'))
            abort(403, 'Você não possui permissão para acessar essa página');

        $registro   = LocalTrabalho::find($id);
        $estados    = State::all();
        $paises    = Pais::all();
        $tipos      = TipoLogradouro::all();
        $tipos_locais      = TipoLocalTrabalho::all();
        $type       = $this->getTypeUser();

        return view('locaistrabalho.editar', compact('registro', 'type', 'estados', 'tipos', 'paises', 'tipos_locais'));
    }

    public function atualizar(LocalTrabalhoRequest $req, $id)
    {
        if (Gate::denies('edit_localtrabalho'))
            abort(403, 'Você não possui permissão para acessar essa página');

        $dados      = $req->all();
        $registro    = LocalTrabalho::find($id);
        $registro->update($dados);

        $this->deleteContatos($registro->id);
        $this->insertContatos($registro->id, $dados['contatos']);

        $req->session()->flash('success', 'Local de Trabalho atualizado com sucesso!');
        return redirect()->route('locaistrabalho');
    }

    public function deletar($id)
    {
        if (Gate::denies('delete_localtrabalho'))
            abort(403, 'Você não possui permissão para acessar essa página');

        $registro = LocalTrabalho::find($id);
        $registro->delete($id);
        
        return response()->json(['success' => true, 'message' => 'Local de Trabalho excluído com sucesso!']);
    }

    public function insertContatos($id, $array){
        if (isset($array) and !empty($array)) {
            for ($i=0; $i < count($array); $i++) { 
                if (isset($array['fone'][$i]) and !empty($array['fone'][$i])) {
                    $contato = Contato::create([
                        'contato' => $array['contato'][$i],
                        'tipo' => $array['tipo'][$i],
                        'fone' => $array['fone'][$i]
                    ]);
                    ContatoLocalTrabalho::create([
                        'contato_id' => $contato->id,
                        'localtrabalho_id' => $id
                    ]);
                }
            }
        }
    }

    public function deleteContatos($id){
        $contatos = ContatoLocalTrabalho::where('localtrabalho_id', $id)->get();
        
        if (isset($contatos) and !empty($contatos)) {
            foreach ($contatos as $key => $value) {
                $cont = Contato::find($value->contato_id);
                $cont->delete($value->contato_id);
                $value->delete($value->id);
            }
        }
    }

}