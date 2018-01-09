<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssociacaoFisica extends Model
{
  
    protected $table = "associacao_fisica";

    protected $fillable = [
    	'entidade_id',
		'categoria_id',
		'socio'
    ];

    public $timestamps = false;
}
