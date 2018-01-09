<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\City;

class StateController extends Controller
{

    public function cidades($id) {

        $query = City::where('state_id', $id)->get()->count();

        if ($query > 0)
        {
            $dados = City::where('state_id', $id)->get();
            return response()->json(['success' => true, 'data' => $dados]);
        }

        return response()->json(['success' => false]);
    }
}
