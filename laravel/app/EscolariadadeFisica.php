<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EscolaridadeFisica extends Model
{
  
    protected $table = "escolaridade_fisica";

    protected $fillable = [
    	'faculdade_id',
		'instituicao',
		'curso',
		'data_colacao',
		'horas',
		'inicio',
		'fim'
    ];

    public $timestamps = false;
}
