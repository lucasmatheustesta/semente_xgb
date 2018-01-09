<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReceitaRequest;
use Illuminate\Support\Facades\Auth;
use App\Receita;
use App\Clinica;
use App\Consultor;
use App\State;
use App\User;
use App\RoleUser;
use Gate;
use Image;

class ReceitaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if (Gate::denies('view_receita'))
            abort(403, 'Você não possui permissão para acessar essa página');
        
        $type           = $this->getTypeUser();
        $clinicas       = Clinica::orderBy('id', 'asc')->get();
        $consultors     = Consultor::orderBy('id', 'asc')->get();

        $start          = $request->input('de');
        $end            = $request->input('ate');
        $busca          = $request->input('busca');

        //$pago           = Receita::selectRaw('sum(valor) as sum')->where('user_id', Auth::user()->id)->where('status', '1')->whereRaw('MONTH(data_pagto) = ?',[date('m')])->whereRaw('YEAR(data_pagto) = ?',[date('Y')])->first();
        $pago           = Receita::selectRaw('sum(valor) as sum')->where('user_id', Auth::user()->id)->where('status', '1')->whereRaw('YEAR(data_cobranca) = ?',[date('Y')])->first();
        $aguardando     = Receita::selectRaw('sum(valor) as sum')->where('user_id', Auth::user()->id)->where('status', '0')->whereRaw('YEAR(data_cobranca) = ?',[date('Y')])->first();


        $month  = $this->getMonth(date('M'));

        if (isset($busca) and !empty($busca) and $busca == 1) {
            if (isset($start) and !empty($start)) {
                $date = explode('/', $start);
                $start = trim($date[2].'-'.$date[1].'-'.$date[0]);
            }
            if (isset($end) and !empty($end)) {
                $date = explode('/', $end);
                $end = trim($date[2].'-'.$date[1].'-'.$date[0]);
            }

            $pago           = Receita::selectRaw('sum(valor) as sum')->where('user_id', Auth::user()->id)->where('status', '1')->whereBetween('data_cobranca', array($start, $end))->first();
            $aguardando     = Receita::selectRaw('sum(valor) as sum')->where('user_id', Auth::user()->id)->where('status', '0')->whereBetween('data_cobranca', array($start, $end))->first();
        }

        if ($type  === 'Admin') {
            $consultor      = $request->input('consultor');
            $clinica        = $request->input('clinica');
            //$registros      = Receita::whereRaw('MONTH(data_cobranca) = ?',[date('m')])->whereRaw('YEAR(data_cobranca) = ?',[date('Y')])->paginate(20);
            $registros      = Receita::where('user_id', Auth::user()->id)->orderBy('data_cobranca', 'desc')->paginate(20);
            
            if (isset($start) or isset($end)) {
                $registros = Receita::whereBetween('data_cobranca', array($start, $end))->whereRaw('YEAR(data_cobranca) = ?',[date('Y')])->paginate(20);
            }

            if (isset($consultor) and !empty($consultor)) {
                $c = Consultor::find($consultor);
                $registros = Receita::where('user_id', $c->user_id)->orderBy('data_cobranca', 'desc')->paginate(20);
                if ((isset($start) and !empty($start)) or (isset($end) and !empty($end))) {
                    $registros = Receita::where('user_id', $c->user_id)->whereBetween('data_cobranca', array($start, $end))->paginate(20);
                }
            }

            if (isset($clinica) and !empty($clinica)) {
                $c = Clinica::find($clinica);
                $registros = Receita::where('user_id', $c->user_id)->orderBy('data_cobranca', 'desc')->paginate(20);
                if ((isset($start) and !empty($start)) or (isset($end) and !empty($end))) {
                    $registros = Receita::where('user_id', $c->user_id)->whereBetween('data_cobranca', array($start, $end))->paginate(20);
                }
            }

        }else{
            $registros = Receita::where('user_id', Auth::user()->id)->orderBy('data_cobranca', 'desc')->paginate(20);
            
            if (isset($start) or isset($end)) {
                $registros = Receita::where('user_id', Auth::user()->id)->whereBetween('data_cobranca', array($start, $end))->paginate(20);
            }
        }

        $first_day  = date('Y-m-d', mktime(0, 0, 0, date('m'), 1, date('Y')));
        $date = explode('-', $first_day);
        $first_day = $date[2].'/'.$date[1].'/'.$date[0];

        $last_day   = date('Y-m-d', mktime(0, 0, 0, date('m')+1, 0, date('Y')));
        $date = explode('-', $last_day);
        $last_day = $date[2].'/'.$date[1].'/'.$date[0];
            
        return view('receitas.index', compact('registros', 'type', 'consultors', 'clinicas','first_day', 'last_day', 'pago', 'aguardando', 'month'));
    }

    public function editar($id)
    {
        if (Gate::denies('edit_receita'))
            abort(403, 'Você não possui permissão para acessar essa página');

        $registro   = Receita::find($id);
        if (isset($registro->data_cobranca) and !empty($registro->data_cobranca)) {
            $date                       = explode('-', $registro->data_cobranca);
            $registro->data_cobranca    = $date[2].'/'.$date[1].'/'.$date[0];
        }        
        $type       = $this->getTypeUser();
        $users      = User::where('id','!=', Auth::user()->id)->get();

        return view('receitas.editar', compact('registro', 'type', 'users'));
    }

    public function atualizar(ReceitaRequest $req, $id)
    {
        if (Gate::denies('edit_receita'))
            abort(403, 'Você não possui permissão para acessar essa página');

        $dados      = $req->all();
        $dados['valor'] = str_replace('.', '', $dados['valor']);
        $dados['valor'] = str_replace(',', '.', $dados['valor']);

        if (isset($dados['data_cobranca']) and !empty($dados['data_cobranca'])) {
            $date = explode('/', $dados['data_cobranca']);
            $dados['data_cobranca'] = $date[2].'-'.$date[1].'-'.$date[0];
        }

        if ($dados['status'] == 1) {
            $dados['data_pagto'] = date('Y-m-d');
        }

        $registro    = Receita::find($id);
        $registro->update($dados);

        $req->session()->flash('success', 'Receita atualizada com sucesso!');
        return redirect()->route('financeiro');
    }

    public function setPago($id)
    {
        if (Gate::denies('edit_receita'))
            abort(403, 'Você não possui permissão para acessar essa página');

        $receita = Receita::find($id);

        $receita->update([
            'status' => '1',
            'data_pagto' => date('Y-m-d')
        ]);

        return response()->json(['success' => true]);
    }
}
