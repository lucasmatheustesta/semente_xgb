<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PessoaFisicaRequest;
use Illuminate\Support\Facades\Auth;
use App\PessoaFisica;
use App\Faculdade;
use App\TipoLogradouro;
use App\Consultor;
use App\Paciente;
use App\Especialidade;
use App\Entidade;
use App\EspecialidadeFisica;
use App\EscolaridadeFisica;
use App\CategoriaProfissional;
use App\Pais;
use App\State;
use App\User;
use App\RoleUser;
use Gate;
use Image;
use PDF;

class PessoaFisicaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {

        if (Gate::denies('view_pessoafisica'))
            abort(403, 'Você não possui permissão para acessar essa página');
        
        $estados        = State::orderBy('name', 'asc')->get();

        $busca          = $request->input('query');
        $estado         = $request->input('estado');
        $cidade         = $request->input('cidade');
        $consultor      = $request->input('consultor');

        $registros = PessoaFisica::paginate(20);

        if (isset($estado) and !empty($estado)){
            $registros = PessoaFisica::where('estado_id', $estado)->paginate(20);
        }

        if (isset($cidade) and !empty($cidade)){
            $registros = PessoaFisica::where('cidade_id', $cidade)->paginate(20);
        }

        if (isset($busca) and !empty($busca)){
            $registros = PessoaFisica::join('users', 'users.id', '=', 'clinicas.user_id')
            ->where('users.name', 'LIKE', "%$busca%")->paginate(20);
        }

        $type = $this->getTypeUser();
        return view('fisicas.index', compact('registros', 'estados', 'type', 'consultors'));
    }

    public function adicionar()
    {
        if (Gate::denies('add_pessoafisica'))
            abort(403, 'Você não possui permissão para acessar essa página');

        $estados    = State::all();
        $tipos      = TipoLogradouro::all();
        $paises      = Pais::all();
        $especialidades      = Especialidade::all();
        $faculdades      = Faculdade::all();
        $entidades      = Entidade::all();
        $categorias      = CategoriaProfissional::all();
        $type = $this->getTypeUser();

        return view('fisicas.adicionar', compact('estados', 'type', 'tipos', 'paises', 'especialidades', 'faculdades', 'entidades', 'categorias'));
    }

    public function salvar(PessoaFisicaRequest $req)
    {
        if (Gate::denies('add_pessoafisica'))
            abort(403, 'Você não possui permissão para acessar essa página');

        $dados = $req->all();
        $type = $this->getTypeUser();
        $registro = PessoaFisica::create($dados);
        $this->insertEspecialidades($registro->id, $dados['especialidades']);
        $this->insertEscolaridades($registro->id, $dados['escolaridades']);

        $req->session()->flash('success', 'Local de Trabalho cadastrado com sucesso!');
        return redirect()->route('locaistrabalho');
    }

    public function editar($id)
    {
        if (Gate::denies('edit_clinica'))
            abort(403, 'Você não possui permissão para acessar essa página');


        $registro        = PessoaFisica::find($id);
        $estados    = State::all();
        $tipos      = TipoLogradouro::all();
        $paises      = Pais::all();
        $especialidades      = Especialidade::all();
        $faculdades      = Faculdade::all();
        $entidades      = Entidade::all();
        $categorias      = CategoriaProfissional::all();
        $type = $this->getTypeUser();

        return view('fisicas.editar', compact( 'registro', 'estados', 'type', 'tipos', 'paises', 'especialidades', 'faculdades', 'entidades', 'categorias'));
    }

    public function insertEspecialidades($id, $array){
        if (isset($array) and !empty($array)) {
            for ($i=0; $i < count($array); $i++) { 
                if (isset($array['especialidade_id'][$i]) and !empty($array['especialidade_id'][$i])) {
                    $contato = EspecialidadeFisica::create([
                        'fisica_id'         => $id,
                        'especialidade_id'  => $array['especialidade_id'][$i],
                        'ano'               => $array['ano'][$i],
                        'registro'          => $array['registro'][$i],
                        'modelo'            => $array['modelo'][$i],
                        'data_aprovacao'    => $array['data_aprovacao'][$i],
                        'rec_amb'           => $array['rec_amb'][$i],
                        'env_amb'           => $array['env_amb'][$i],
                        'socio'             => $array['socio'][$i]
                    ]);
                }
            }
        }
    }

    public function insertEscolaridades($id, $array){
        if (isset($array) and !empty($array)) {
            for ($i=0; $i < count($array); $i++) { 
                if (isset($array['faculdade_id'][$i]) and !empty($array['faculdade_id'][$i])) {
                    $contato = EscolaridadeFisica::create([
                        'fisica_id'         => $id,
                        'faculdade_id'  => $array['faculdade_id'][$i],
                        'instituicao'  => $array['instituicao'][$i],
                        'curso'  => $array['curso'][$i],
                        'data_colacao'  => $array['data_colacao'][$i],
                        'horas'  => $array['horas'][$i],
                        'inicio'  => $array['inicio'][$i],
                        'fim'  => $array['fim'][$i],
                    ]);
                }
            }
        }
    }

    public function deleteEspecialidades($id){
        $registros = EspecialidadeFisica::where('fisica_id', $id)->get();
        
        if (isset($registros) and !empty($registros)) {
            foreach ($registros as $key => $value) {
                $cont = EspecialidadeFisica::find($value->contato_id);
                $cont->delete($value->contato_id);
                $value->delete($value->id);
            }
        }
    }

    public function deleteEscolaridades($id){
        $registros = EscolaridadeFisica::where('fisica_id', $id)->get();
        
        if (isset($registros) and !empty($registros)) {
            foreach ($registros as $key => $value) {
                $cont = EscolaridadeFisica::find($value->contato_id);
                $cont->delete($value->contato_id);
                $value->delete($value->id);
            }
        }
    }
}