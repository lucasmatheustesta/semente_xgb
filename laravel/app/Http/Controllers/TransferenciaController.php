<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\FarurRequest;
use Illuminate\Support\Facades\Auth;
use App\State;
use App\User;
use App\RoleUser;
use Gate;
use Image;
use PDF;

class TransferenciaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {

        if (Gate::denies('view_regional'))
            abort(403, 'Você não possui permissão para acessar essa página');

        $registros      = [];

        $type = $this->getTypeUser();
        return view('transferencias.index', compact('registros', 'type'));
    }
}