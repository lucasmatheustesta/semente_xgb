<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClinicaRequest;
use Illuminate\Support\Facades\Auth;
use App\Clinica;
use App\Consultor;
use App\Paciente;
use App\State;
use App\User;
use App\RoleUser;
use Gate;
use Image;
use PDF;

class ClinicaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if (Gate::denies('view_clinica'))
            abort(403, 'Você não possui permissão para acessar essa página');
    	
        $estados        = State::orderBy('name', 'asc')->get();
        $consultors     = Consultor::orderBy('id', 'asc')->get();
        $busca          = $request->input('query');
        $estado         = $request->input('estado');
        $cidade         = $request->input('cidade');
        $consultor      = $request->input('consultor');

        $registros = Clinica::paginate(20);

        if (isset($estado) and !empty($estado)){
            $registros = Clinica::where('estado_id', $estado)->paginate(20);
        }

        if (isset($cidade) and !empty($cidade)){
            $registros = Clinica::where('cidade_id', $cidade)->paginate(20);
        }

        if (isset($busca) and !empty($busca)){
            $registros = Clinica::join('users', 'users.id', '=', 'clinicas.user_id')
            ->where('users.name', 'LIKE', "%$busca%")->paginate(20);
        }

        if (isset($consultor) and !empty($consultor)){
            $registros = Clinica::join('clinica_consultor', 'clinica_consultor.clinica_id', '=', 'clinicas.id')
            ->where('clinica_consultor.consultor_id', '=', "$consultor")->paginate(20);
        }

        $type = $this->getTypeUser();
    	return view('clinicas.index', compact('registros', 'estados', 'type', 'consultors'));
    }

    public function adicionar()
    {
        if (Gate::denies('add_clinica'))
            abort(403, 'Você não possui permissão para acessar essa página');

    	$estados 	= State::all();
        $type = $this->getTypeUser();

    	return view('clinicas.adicionar', compact('estados', 'type'));
    }

    public function salvar(ClinicaRequest $req)
    {
        if (Gate::denies('add_clinica'))
            abort(403, 'Você não possui permissão para acessar essa página');

        $dados = $req->all();

        if (isset($dados['slim']) and !empty($dados['slim'])) {
            $image = json_decode($dados['slim'], true);
            $file = $this->saveFile($image['output']['image'], $image['input']['name'], 'img/users/');
            $dados['image'] = $file['path'];
        }else{
            $dados['image'] = null;
        }

        $id = User::create([
            'name' => $dados['name'],
            'email' => $dados['email'],
            'image' => $dados['image'],
            'password' => bcrypt($dados['password']),
        ])->id;

        if (isset($id) and !empty($id)) {
            RoleUser::create([
                'user_id' => $id,
                'role_id' => 2,
            ]);
            $dados['user_id'] = $id;
        }else{
            $req->session()->flash('danger', 'Ops, houve um erro ao cadastrar a clínica.');
            return redirect()->route('clinicas');
        }

        Clinica::create($dados);

        $req->session()->flash('success', 'Clínica cadastrada com sucesso!');
    	return redirect()->route('clinicas');
    }

    public function editar($id)
    {
        if (Gate::denies('edit_clinica'))
            abort(403, 'Você não possui permissão para acessar essa página');


    	$registro 	= Clinica::find($id);
    	$estados 	= State::all();
        $type       = $this->getTypeUser();

    	return view('clinicas.editar', compact('registro', 'estados', 'type'));
    }

    public function atualizar(ClinicaRequest $req, $id)
    {
        if (Gate::denies('edit_clinica'))
            abort(403, 'Você não possui permissão para acessar essa página');

    	$dados      = $req->all();
        $registro    = Clinica::find($id);
        $user       = User::find($registro->user_id);
        
        $user->update([
            'name' => $dados['name'],
            'email' => $dados['email'],
        ]);

        if (isset($dados['password']) and !empty($dados['password']) and $dados['password'] != 'marcosferrarez') {
            $user->update([
                'password' => bcrypt($dados['password']),
            ]);
        }

        if (isset($dados['slim']) and !empty($dados['slim'])) {
            $image = json_decode($dados['slim'], true);
            $file = $this->saveFile($image['output']['image'], $image['input']['name'], 'img/users/');
            $user->update([
                'image' => $file['path'],
            ]);
        }

    	$registro->update($dados);

        $req->session()->flash('success', 'Clínica atualizada com sucesso!');
    	return redirect()->route('clinicas');
    }

    public function accepted(Request $req, $id)
    {
        $dados          = $req->all();
        $registro       = Clinica::find($id);

        if (isset($dados['accepted']) and !empty($dados['accepted'])) {
            $registro->update([
                'accepted' => $dados['accepted']
            ]);

            $req->session()->flash('success', 'Bem vindo ao Sistema!');
            return redirect()->route('dashboard');
        }

        $req->session()->flash('danger', 'Aceite os termos antes de começar a usar o sistema.');
        return redirect()->route('dashboard');
    }

    public function deletar($id)
    {
        if (Gate::denies('delete_clinica'))
            abort(403, 'Você não possui permissão para acessar essa página');

        $registro = Clinica::find($id);
        User::find($registro->user_id)->delete($registro->user_id);
        $registro->delete($id);
        
        return response()->json(['success' => true, 'message' => 'Clínica excluída com sucesso!']);
    }

    public function pacientes($consultor, $clinica) {

        $query = Paciente::where('clinica_id', '=', $clinica)->where('consultor_id', '=', $consultor)->get()->count();
        if ($query > 0)
        {
            $dados = Paciente::where('clinica_id', '=', $clinica)->where('consultor_id', '=', $consultor)->get();
            $pacientes = [];

            $i=0; foreach ($dados as $key => $value) {
                $pacientes[$i]['id'] = $value->id;
                $pacientes[$i]['name'] = $value->name;
                $i++;
            }
            return response()->json(['success' => true, 'data' => $pacientes]);
        }

        return response()->json(['success' => false]);
    }

    public function contrato(Request $request)
    {
        $registro = Clinica::where('user_id', Auth::user()->id)->get()->first();
        $months = array(1 =>'Janeiro', 2 => 'Fevereiro', 3 => 'Março', 4 => 'Abril', 5 => 'Maio', 6 => 'Junho', 7 =>'Julho', 8 => 'Agosto', 9 => 'Setembro', 10 => 'Outubro', 11 => 'Novembro', 12 => 'Dezembro');
        $registro->month = $months[(int) date('m')];

        view()->share('registro',$registro);

        $pdf = PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        
        $pdf->loadView('clinicas.contrato');
        return $pdf->stream('contrato.pdf');

        // if($request->has('download')){
        //     $pdf = PDF::loadView('clinicas.contrato');
        //     return $pdf->download('pdfview.pdf');
        // }

        // return view('clinicas.contrato');
    }
}