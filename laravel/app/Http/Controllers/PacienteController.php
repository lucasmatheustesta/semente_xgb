<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PacienteRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Paciente;
use App\Consultor;
use App\Clinica;
use App\Receita;
use App\State;
use App\User;
use App\Venda;
use App\Servico;
use App\ServicoVenda;
use Gate;
use Image;

class PacienteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if (Gate::denies('view_paciente'))
            abort(403, 'Você não possui permissão para acessar essa página');
        
        $estados        = State::orderBy('name', 'asc')->get();
        $clinicas       = Clinica::orderBy('id', 'asc')->get();
        $busca          = $request->input('query');
        $estado         = $request->input('estado');
        $cidade         = $request->input('cidade');

        $type = $this->getTypeUser();

        if ($type  === 'Admin') {
            $registros = Paciente::paginate(20);
            $consultors     = Consultor::orderBy('id', 'asc')->get();

            if (isset($estado) and !empty($estado)){
                $registros = Paciente::where('estado_id', $estado)->paginate(20);
            }

            if (isset($cidade) and !empty($cidade)){
                $registros = Paciente::where('cidade_id', $cidade)->paginate(20);
            }

            if (isset($busca) and !empty($busca)){
                $registros = Paciente::join('users', 'users.id', '=', 'pacientes.user_id')
                ->where('users.name', 'LIKE', "%$busca%")->paginate(20);
            }
        }
        elseif($type  === 'Clínica'){
            $clinica        = Clinica::where('user_id', Auth::user()->id)->get();
            $consultors     = $clinica[0]->consultors;
            $registros      = Paciente::where('clinica_id', $clinica[0]->id)->paginate(20);

            if (isset($estado) and !empty($estado)){
                $registros = Paciente::where('estado_id', '=', $estado)->where('clinica_id', '=', $clinica[0]->id)->paginate(20);
            }

            if (isset($cidade) and !empty($cidade)){
                $registros = Paciente::where('cidade_id', '=', $cidade)->where('clinica_id', '=', $clinica[0]->id)->paginate(20);
            }

            if (isset($busca) and !empty($busca)){
                $registros = Paciente::where('name', 'LIKE', "%$busca%")->where('clinica_id', '=', $clinica[0]->id)->paginate(20);
            }
        }
        else{
            $consultor = Consultor::where('user_id', Auth::user()->id)->get();
            $registros = Paciente::where('consultor_id', $consultor[0]->id)->paginate(20);

            if (isset($estado) and !empty($estado)){
                $registros = Paciente::where('estado_id', '=', $estado)->where('consultor_id', '=', $consultor[0]->id)->paginate(20);
            }

            if (isset($cidade) and !empty($cidade)){
                $registros = Paciente::where('cidade_id', '=', $cidade)->where('consultor_id', '=', $consultor[0]->id)->paginate(20);
            }

            if (isset($busca) and !empty($busca)){
                $registros = Paciente::where('name', 'LIKE', "%$busca%")->where('consultor_id', '=', $consultor[0]->id)->paginate(20);
            }
        }

        return view('pacientes.index', compact('registros', 'estados', 'type', 'clinicas', 'consultors'));
    }

    public function adicionar()
    {
        if (Gate::denies('add_paciente'))
            abort(403, 'Você não possui permissão para acessar essa página');

        $estados        = State::all();
        
        $type = $this->getTypeUser();

        if ($type  === 'Admin') {
            $consultores    = Consultor::all();
            return view('pacientes.adicionar', compact('estados', 'type', 'consultores'));
        }
        elseif ($type === 'Clínica') {
            $clinica            = Clinica::where('user_id', Auth::user()->id)->get();
            $consultores     = $clinica[0]->consultors;

            return view('pacientes.adicionar', compact('estados', 'type', 'consultores'));
        }
        else{
            $consultor = Consultor::where('user_id', Auth::user()->id)->get();
            $consultor_id = $consultor[0]->id;
            $clinicas = $consultor[0]->clinicas;

            return view('pacientes.adicionar', compact('estados', 'type', 'clinicas', 'consultor_id'));
        }

        return false;
    }

    public function salvar(PacienteRequest $req)
    {
        if (Gate::denies('add_paciente'))
            abort(403, 'Você não possui permissão para acessar essa página');

        $dados = $req->all();
        $type = $this->getTypeUser();

        if (isset($dados['slim']) and !empty($dados['slim'])) {
            $image = json_decode($dados['slim'], true);
            $file = $this->saveFile($image['output']['image'], $image['input']['name'], 'img/users/');
            $dados['image'] = $file['path'];
        }

        $registro = Paciente::create($dados);
        $req->session()->flash('success', 'Paciente cadastrado com sucesso!');
        return redirect()->route('pacientes');
    }

    public function editar($id)
    {
        if (Gate::denies('edit_paciente'))
            abort(403, 'Você não possui permissão para acessar essa página');

        $registro       = Paciente::find($id);
        $estados        = State::all();
        $consultores    = Consultor::all();
        $type           = $this->getTypeUser();

        return view('pacientes.editar', compact('registro', 'estados', 'type', 'consultores'));
    }


    public function contrato($id)
    {
        if (Gate::denies('edit_contrato'))
            abort(403, 'Você não possui permissão para acessar essa página');

        $venda          = Venda::where('paciente_id', $id)->where('deleted_at', '=' , null)->first();
        $consultores    = Consultor::all();
        $servicos       = Servico::all();
        $clinicas       = Clinica::all();
        $nextId         = Venda::max('id') + 1;
        $type           = $this->getTypeUser();
        $consultor_id   = null;
        $clinica_id     = null;
        $pacientes      = null;
   
        if (!isset($venda) or empty($venda)) {
            if ($type == 'Consultor') {
                $user = Consultor::where('user_id', Auth::user()->id)->first();
                $consultor_id = $user->id;
            }

            if ($type == 'Clínica') {
                $user           = Clinica::where('user_id', Auth::user()->id)->first();
                $consultores    = $user->consultors;
                $pacientes      = Paciente::where('clinica_id', $user->id)->get();
                $clinica_id = $user->id;
                $consultor_id = $venda->consultor_id;
            }

            return view('contratos.adicionar', compact('type', 'clinicas', 'servicos', 'consultores', 'nextId', 'consultor_id', 'clinica_id', 'pacientes', 'id'));
        }

        $registro       = Venda::find($venda->id);      
        
        if (isset($registro->date) and !empty($registro->date)) {
            $date = explode('-', $registro->date);
            $registro->date = $date[2].'/'.$date[1].'/'.$date[0];
        }

        if ($type == 'Consultor') {
            $user = Consultor::where('user_id', Auth::user()->id)->first();
            $consultor_id = $user->id;
        }

        if ($type == 'Clínica') {
            $user           = Clinica::where('user_id', Auth::user()->id)->first();
            $consultores    = $user->consultors;
            $pacientes      = Paciente::where('clinica_id', $user->id)->get();
            $clinica_id = $user->id;
            $consultor_id = $venda->consultor_id;
        }

        $servico_venda = ServicoVenda::where('venda_id', $venda->id)->get();

        return view('contratos.editar', compact('registro', 'type', 'consultores','clinicas', 'servicos', 'consultores', 'nextId', 'servico_venda', 'consultor_id', 'clinica_id', 'pacientes'));
    }

    public function atualizar(PacienteRequest $req, $id)
    {
        if (Gate::denies('edit_paciente'))
            abort(403, 'Você não possui permissão para acessar essa página');

        $dados      = $req->all();
        $registro    = Paciente::find($id);

        if (isset($dados['slim']) and !empty($dados['slim'])) {
            $image = json_decode($dados['slim'], true);
            $file = $this->saveFile($image['output']['image'], $image['input']['name'], 'img/users/');
            $dados['image'] = $file['path'];
        }

        $registro->update($dados);

        $req->session()->flash('success', 'Paciente atualizado com sucesso!');
        return redirect()->route('pacientes');
    }

    public function deletar($id)
    {
        if (Gate::denies('delete_paciente'))
            abort(403, 'Você não possui permissão para acessar essa página');

        $registro = Paciente::find($id);
        $registro->delete($id);
        
        return response()->json(['success' => true, 'message' => 'Paciente excluído com sucesso!']);
    }
}
