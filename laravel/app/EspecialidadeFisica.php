<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EspecialidadeFisica extends Model
{
  
    protected $table = "especialidade_fisica";

    protected $fillable = [
    	'especialidade_id',
		'ano',
		'registro',
		'modelo',
		'data_aprovacao',
		'rec_amb',
		'env_pres',
		'env_amb',
		'socio'
    ];

    public $timestamps = false;
}
