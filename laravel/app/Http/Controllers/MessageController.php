<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class MessageController extends Controller
{
    public function index()
    {
    	$type = $this->getTypeUser();
    	return view('messages.index', compact('type'));
    }
}
