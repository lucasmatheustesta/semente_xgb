<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContratoRequest;
use Illuminate\Support\Facades\Auth;
use App\Paciente;
use App\Consultor;
use App\Venda;
use App\Receita;
use App\Servico;
use App\ServicoVenda;
use App\Clinica;
use App\State;
use App\User;
use Gate;
use Image;

class ContratoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if (Gate::denies('view_contrato'))
            abort(403, 'Você não possui permissão para acessar essa página');
        
        $clinicas       = Clinica::orderBy('id', 'asc')->get();
        $type = $this->getTypeUser();

        if ($type  === 'Admin') {
            $registros = Venda::paginate(20);
        }
        elseif($type  === 'Clínica'){
            $user = Clinica::where('user_id', Auth::user()->id)->get();
            $registros = Venda::where('clinica_id', $user[0]->id)->paginate(20);
        }
        else{
            $user = Consultor::where('user_id', Auth::user()->id)->get();
            $registros = Venda::where('consultor_id', $user[0]->id)->paginate(20);
        }

        foreach ($registros as $key => $value) {
            $valor = Receita::selectRaw('sum(valor) as sum')->where('venda_id', $value->id)->first();
            $value->valor = $valor->sum;
        }

        return view('contratos.index', compact('registros' , 'type', 'clinicas'));
    }

    public function adicionar()
    {
        
        if (Gate::denies('add_contrato'))
            abort(403, 'Você não possui permissão para acessar essa página');

        $consultores    = Consultor::all();
        $servicos       = Servico::all();
        $clinicas       = Clinica::all();
        $nextId         = Venda::max('id') + 1;
        $type           = $this->getTypeUser();
        $consultor_id   = null;
        
        if ($type == 'Consultor') {
            $user = Consultor::where('user_id', Auth::user()->id)->first();
            $clinicas = $user->clinicas;
            $consultor_id = $user->id;
        }

        return view('contratos.adicionar', compact('type', 'clinicas', 'servicos', 'consultores', 'nextId', 'consultor_id'));
    }

    public function salvar(ContratoRequest $req)
    {
        if (Gate::denies('add_contrato'))
            abort(403, 'Você não possui permissão para acessar essa página');

        $dados = $req->all();

        if (isset($dados['date']) and !empty($dados['date'])) {
            $date = explode('/', $dados['date']);
            $dados['date'] = $date[2].'-'.$date[1].'-'.$date[0];
        }
        else{
            $dados['date'] = date('Y-m-d');
        }

        $paciente           = Paciente::find($dados['paciente_id']);
        $clinica            = Clinica::find($paciente->clinica_id);
        $consultor          = Consultor::find($paciente->consultor_id);
        $receita_consultor  = Venda::where('consultor_id', $consultor->id)->where('paciente_id', $paciente->id)->where('deleted_at', '=' , null)->first();
        
        if (isset($receita_consultor) and !empty($receita_consultor)) {
            $receita_consultor = false;
        }else{
            $receita_consultor = true;
        }

        $registro = Venda::create($dados);
        $this->saveContrato($dados, $registro, $receita_consultor);

        $req->session()->flash('success', 'Contrato cadastrado com sucesso!');
        return redirect()->route('contratos.relatorio', $registro->id);
    }

    public function saveContrato($dados, $registro, $receita_consultor)
    {
        if (!isset($dados['date']) or empty($dados['date'])) {
            $dados['date'] = date('Y-m-d');
        }

        $paciente           = Paciente::find($dados['paciente_id']);
        $clinica            = Clinica::find($paciente->clinica_id);
        $consultor          = Consultor::find($paciente->consultor_id);

        // Datas para calculo dos pagamentos
        $first_day              = date('Y-m-d', mktime(0, 0, 0, date('m'), 1, date('Y')));
        $last_day               = date('Y-m-d', mktime(0, 0, 0, date('m')+1, 0, date('Y')));
        $day                    = date('w');
        $week_end               = date('Y-m-d', strtotime('+'.(5-$day).' days'));

        $month = 1;
        $semana = 7;
        $quinzena = 15;
        $mes_seguinte   = date('Y-m-d', strtotime("+$month months",strtotime($first_day)));
        $semanal        = date('Y-m-d', strtotime("next Friday", strtotime($mes_seguinte)));
        $quinzenal      = date('Y-m-d', strtotime("+15 days",strtotime($first_day)));
        $r=1;

        for ($s=0; $s < count($dados['servico_id']); $s++) { 
             
            if (isset($dados['servico_id'][$s]) and !empty($dados['servico_id'][$s]) and isset($dados['valor'][$s]) and !empty($dados['valor'][$s])) {
                $valor = $dados['valor'][$s];
                $valor = str_replace('.', '', $valor);
                $valor = str_replace(',', '.', $valor);

                if (isset($dados['pasta'][$s]) and !empty($dados['pasta'][$s])) {
                    $pasta = $dados['pasta'][$s];
                    $pasta = str_replace('.', '', $pasta);
                    $pasta = str_replace(',', '.', $pasta);
                }else{
                    $pasta = null;
                }

                if (isset($dados['servicovenda_id'][$s]) and !empty($dados['servicovenda_id'][$s])) {
                    $servicovenda = ServicoVenda::find($dados['servicovenda_id'][$s]);
                    $servicovenda->update([
                        'servico_id' => $dados['servico_id'][$s],
                        'venda_id' => $registro->id,
                        'valor' => $valor,
                        'pasta' => $pasta,
                    ]);
                }else{
                    $servicovenda = ServicoVenda::create([
                        'servico_id' => $dados['servico_id'][$s],
                        'venda_id' => $registro->id,
                        'valor' => $valor,
                        'pasta' => $pasta,
                        'user_id' => Auth::user()->id,
                    ]);
                }
              
                if ($clinica->pagamento == 'mensal') {
                    $mes_seguinte   = date('Y-m-d', strtotime("+$month months",strtotime($first_day)));
                    $data_cobranca  = date('Y-m-d', strtotime("+9 days",strtotime($mes_seguinte)));
                    $month++;
                }
                elseif($clinica->pagamento == 'quinzenal'){
                    $quinzenal = date('Y-m-d', strtotime("+15 days",strtotime($quinzenal)));
                }else{
                    $data_cobranca = $semanal;
                    $semanal = date('Y-m-d', strtotime("+7 days",strtotime($semanal)));
                }

                $metodo = $this->typeMetodo($dados['servico_id'][$s]);

                if ($metodo == 1) {
                        // PRIMEIRA PARCELA
                        $v = $valor - $pasta;

                        // Adm
                        $receita = Receita::create([
                            'valor' => $v,
                            'data_cobranca' => $data_cobranca,
                            'status' => '0',
                            'user_id' => 1,
                            'description' => '1ª Parcela',
                            'venda_id' => $registro->id,
                            'servico_id' => $dados['servico_id'][$s],
                            'servicovenda_id' => $servicovenda->id,
                        ]);
                        
                        // Clínica
                        $receita = Receita::create([
                            'valor' => $v,
                            'data_cobranca' => $data_cobranca,
                            'status' => '0',
                            'user_id' => $clinica->user_id,
                            'venda_id' => $registro->id,
                            'description' => 'Comissão 1ª Parcela',
                            'servico_id' => $dados['servico_id'][$s],
                            'servicovenda_id' => $servicovenda->id,
                        ]);
                        
                }
                else{

                    $v = ($valor / 100 * 10) - $pasta;
                 
                    // Adm
                    $receita = Receita::create([
                        'valor' => $v,
                        'data_cobranca' => $data_cobranca,
                        'status' => '0',
                        'user_id' => 1,
                        'venda_id' => $registro->id,
                        'servico_id' => $dados['servico_id'][$s],
                        'servicovenda_id' => $servicovenda->id,
                    ]);

                    // Clínica
                    $receita = Receita::create([
                        'valor' => $v,
                        'data_cobranca' => $data_cobranca,
                        'status' => '0',
                        'user_id' => $clinica->user_id,
                        'venda_id' => $registro->id,
                        'servico_id' => $dados['servico_id'][$s],
                        'servicovenda_id' => $servicovenda->id,
                    ]);

                }
                
            }
        }
    }

    public function typeMetodo($value)
    {
        $registro   = Servico::find($value);

        if (isset($registro->type) and $registro->type == 'outros')
        {
            if ($registro->implante == 0) {
                return 2;
            }
            return 3;
        }
        else{
            return 1;
        }

        return false;
    }

    public function editar($id)
    {
        if (Gate::denies('edit_contrato'))
            abort(403, 'Você não possui permissão para acessar essa página');

        $registro       = Venda::find($id);
        $consultores    = Consultor::all();
        $servicos       = Servico::all();
        $clinicas       = Clinica::all();
        $nextId         = Venda::max('id') + 1;
        $type           = $this->getTypeUser();
        $consultor_id   = null;
        $clinica_id     = null;
        $pacientes      = null;
        
        if (isset($registro->date) and !empty($registro->date)) {
            $date = explode('-', $registro->date);
            $registro->date = $date[2].'-'.$date[1].'-'.$date[0];
        }

        if ($type == 'Consultor') {
            $user           = Consultor::where('user_id', Auth::user()->id)->first();
            $clinicas       = $user->clinicas;
            $consultor_id = $user->id;
        }

        if ($type == 'Clínica') {
            $user           = Clinica::where('user_id', Auth::user()->id)->first();
            $consultores    = $user->consultors;
            $pacientes      = Paciente::where('clinica_id', $user->id)->get();
            $clinica_id = $user->id;
            $consultor_id = $registro->consultor_id;
        }

        $servico_venda = ServicoVenda::where('venda_id', $id)->get();

        return view('contratos.editar', compact('registro', 'type', 'consultores','clinicas', 'servicos', 'consultores', 'nextId', 'servico_venda', 'consultor_id', 'clinica_id', 'pacientes'));
    }

    public function relatorio($id)
    {
        if (Gate::denies('edit_paciente'))
            abort(403, 'Você não possui permissão para acessar essa página');

        $registro       = Venda::find($id);
        $estados        = State::all();
        $consultores    = Consultor::all();
        $type           = $this->getTypeUser();

        $receitas_marcos        = Receita::where('user_id', 1)->where('venda_id', $registro->id)->orderBy('data_cobranca', 'asc')->get();
        $receitas_clinica       = Receita::where('user_id', $registro->clinica->user_id)->where('venda_id', $registro->id)->orderBy('data_cobranca', 'asc')->get();
        $receitas_consultor     = Receita::where('user_id', $registro->consultor->user_id)->where('venda_id', $registro->id)->orderBy('data_cobranca', 'asc')->get();
        $servicos               = ServicoVenda::where('venda_id', $registro->id)->get();

        return view('contratos.relatorio', compact('registro', 'estados', 'type', 'consultores', 'receitas_marcos', 'receitas_pixelweb', 'receitas_clinica', 'receitas_consultor', 'servicos'));
    }

    public function atualizar(ContratoRequest $req, $id)
    {
        if (Gate::denies('edit_contrato'))
            abort(403, 'Você não possui permissão para acessar essa página');

        $dados       = $req->all();

        if (isset($dados['date']) and !empty($dados['date'])) {
            $date = explode('/', $dados['date']);
            $dados['date'] = $date[2].'-'.$date[1].'-'.$date[0];
        }
        else{
            $dados['date'] = date('Y-m-d');
        }

        $registro    = Venda::find($id);
        $registro->update($dados);

        $receitas = Receita::where('venda_id', $registro->id)->get();
        if (isset($receitas) and !empty($receitas)) {
            foreach ($receitas as $key => $value) {
                $value->delete($value->id);
            }
        }

        $servicovendas = ServicoVenda::where('venda_id', $registro->id)->get();

        if (isset($servicovendas) and !empty($servicovendas)) {
             foreach ($servicovendas as $ksy => $s) {
                $s->delete($s->id);
            }
        }

        $paciente           = Paciente::find($dados['paciente_id']);
        $clinica            = Clinica::find($paciente->clinica_id);
        $consultor          = Consultor::find($paciente->consultor_id);
        $receita_consultor  = Venda::where('consultor_id', $consultor->id)->where('paciente_id', $paciente->id)->where('deleted_at', '=' , null)->first();
        if (isset($receita_consultor) and !empty($receita_consultor)) {
            $receita_consultor = false;
        }else{
            $receita_consultor = true;
        }

        $this->saveContrato($dados, $registro, $receita_consultor);

        $req->session()->flash('success', 'Contrato atualizado com sucesso!');
        return redirect()->route('contratos.relatorio', $registro->id);
    }

    public function deletar(Request $req)
    {
        if (Gate::denies('delete_contrato'))
            abort(403, 'Você não possui permissão para acessar essa página');

        $dados = $req->all();
        $type = $dados['excluir'];
        $registro = Venda::find($dados['id']);

        if ($type == 1) {
            $registro->delete($dados['id']);
        }
        elseif ($type == 2) {
            $last_day   = date('Y-m-d', mktime(0, 0, 0, date('m')+1, 0, date('Y')));
            $receitas = Receita::where('venda_id', $dados['id'])->where('data_cobranca','>', $last_day)->get();
            $qtde = count($receitas);

            foreach ($receitas as $key => $value) {
                $value->delete($value->id);
            }
            $registro->delete($dados['id']);

            return response()->json(['success' => true, 'message' => 'Contrato com '.$qtde.' receita(s) excluído com sucesso!']);
        }
        elseif ($type == 3) {
            $receitas = Receita::where('venda_id', $dados['id'])->get();
            $qtde = count($receitas);
            foreach ($receitas as $key => $value) {
                $value->delete($value->id);
            }
            $registro->delete($dados['id']);

            return response()->json(['success' => true, 'message' => 'Contrato com '.$qtde.' receita(s) excluído com sucesso!']);
        }

        return response()->json(['success' => true, 'message' => 'Contrato excluído com sucesso!']);
    }

    public function deletarServico(Request $req)
    {
        if (Gate::denies('delete_contrato'))
            abort(403, 'Você não possui permissão para acessar essa página');

        $dados      = $req->all();
        $type       = $dados['excluir'];
        $registro   = ServicoVenda::find($dados['id']);

        if ($type == 1) {
            $registro->delete($dados['id']);
        }
        elseif ($type == 2) {
            $last_day   = date('Y-m-d', mktime(0, 0, 0, date('m')+1, 0, date('Y')));
            $receitas   = Receita::where('servicovenda_id', $dados['id'])->where('data_cobranca','>', $last_day)->get();
            $qtde       = count($receitas);

            foreach ($receitas as $key => $value) {
                $value->delete($value->id);
            }
            $registro->delete($dados['id']);

            return response()->json(['success' => true, 'message' => 'Serviço com '.$qtde.' receita(s) excluído com sucesso!']);
        }
        elseif ($type == 3) {
            $receitas   = Receita::where('servicovenda_id', $dados['id'])->get();
            $qtde       = count($receitas);

            foreach ($receitas as $key => $value) {
                $value->delete($value->id);
            }
            $registro->delete($dados['id']);

            return response()->json(['success' => true, 'message' => 'Serviço com '.$qtde.' receita(s) excluído com sucesso!']);
        }

        return response()->json(['success' => true, 'message' => 'Serviço excluído com sucesso!']);
    }
}
