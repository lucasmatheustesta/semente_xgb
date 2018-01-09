<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoLogradouro extends Model
{
  
    protected $table = "tipos_logradouros";

    protected $fillable = [
    	'nome'
    ];

    public $timestamps = false;
}
