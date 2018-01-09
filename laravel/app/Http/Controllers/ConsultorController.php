<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ConsultorRequest;
use App\Consultor;
use App\Clinica;
use App\State;
use App\User;
use App\RoleUser;
use Gate;
use Image;

class ConsultorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if (Gate::denies('view_consultor'))
            abort(403, 'Você não possui permissão para acessar essa página');
        
        $estados        = State::orderBy('name', 'asc')->get();
        $clinicas       = Clinica::orderBy('id', 'asc')->get();
        $busca          = $request->input('query');
        $estado         = $request->input('estado');
        $cidade         = $request->input('cidade');
        $clinica        = $request->input('clinica');

        $registros = Consultor::paginate(20);

        if (isset($estado) and !empty($estado)){
            $registros = Consultor::where('estado_id', $estado)->paginate(20);
        }

        if (isset($cidade) and !empty($cidade)){
            $registros = Consultor::where('cidade_id', $cidade)->paginate(20);
        }

        if (isset($busca) and !empty($busca)){
            $registros = Consultor::join('users', 'users.id', '=', 'consultors.user_id')
            ->where('users.name', 'LIKE', "%$busca%")->paginate(20);
        }

        if (isset($clinica) and !empty($clinica)){
            $registros = Consultor::join('clinica_consultor', 'clinica_consultor.consultor_id', '=', 'consultors.id')
            ->where('clinica_consultor.clinica_id', '=', "$clinica")->paginate(20);
        }

        $type = $this->getTypeUser();
        return view('consultores.index', compact('registros', 'estados', 'type', 'clinicas'));
    }

    public function adicionar()
    {
        if (Gate::denies('add_consultor'))
            abort(403, 'Você não possui permissão para acessar essa página');

        $estados    = State::all();
        $clinicas   = Clinica::all();
        $type = $this->getTypeUser();

        return view('consultores.adicionar', compact('estados', 'type', 'clinicas'));
    }

    public function salvar(ConsultorRequest $req)
    {
        if (Gate::denies('add_consultor'))
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
                'role_id' => 3,
            ]);
            $dados['user_id'] = $id;
        }else{
            $req->session()->flash('danger', 'Ops, houve um erro ao cadastrar o consultor.');
            return redirect()->route('consultores');
        }

        $registro = Consultor::create($dados);

        if (isset($dados['clinicas']) and !empty($dados['clinicas'])) {
            $registro->clinicas()->attach($dados['clinicas']);
        }

        $req->session()->flash('success', 'Consultor cadastrado com sucesso!');
        return redirect()->route('consultores');
    }

    public function editar($id)
    {
        if (Gate::denies('edit_consultor'))
            abort(403, 'Você não possui permissão para acessar essa página');

        $registro   = Consultor::find($id);
        $estados    = State::all();
        $clinicas   = Clinica::all();
        $type       = $this->getTypeUser();

        return view('consultores.editar', compact('registro', 'estados', 'type', 'clinicas'));
    }

    public function atualizar(ConsultorRequest $req, $id)
    {
        if (Gate::denies('edit_consultor'))
            abort(403, 'Você não possui permissão para acessar essa página');

        $dados      = $req->all();
        $registro    = Consultor::find($id);
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

        if (isset($dados['clinicas']) and !empty($dados['clinicas'])) {
            $registro->clinicas()->sync($dados['clinicas']);
        }

        $registro->update($dados);

        $req->session()->flash('success', 'Consultor atualizado com sucesso!');
        return redirect()->route('consultores');
    }

    public function deletar($id)
    {
        if (Gate::denies('delete_consultor'))
            abort(403, 'Você não possui permissão para acessar essa página');

        $registro = Consultor::find($id);
        User::find($registro->user_id)->delete($registro->user_id);
        $registro->delete($id);
        
        return response()->json(['success' => true, 'message' => 'Consultor excluído com sucesso!']);
    }

    public function clinicas($id) {

        $query = Consultor::join('clinica_consultor', 'clinica_consultor.consultor_id', '=', 'consultors.id')->where('clinica_consultor.consultor_id', '=', $id)->get()->count();
        if ($query > 0)
        {
            $dados = Clinica::join('clinica_consultor', 'clinica_consultor.clinica_id', '=', 'clinicas.id')->where('clinica_consultor.consultor_id', '=', $id)->get();
            $clinicas = [];

            $i=0; foreach ($dados as $key => $value) {
                $clinicas[$i]['id'] = $value->clinica_id;
                $clinicas[$i]['name'] = $value->user->name;
                $i++;
            }
            return response()->json(['success' => true, 'data' => $clinicas]);
        }

        return response()->json(['success' => false]);
    }
}
