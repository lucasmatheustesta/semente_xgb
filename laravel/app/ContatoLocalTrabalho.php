<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContatoLocalTrabalho extends Model
{
  
    protected $table = "contato_localtrabalho";

    protected $fillable = [
    	'localtrabalho_id',
    	'contato_id'
    ];

    public $timestamps = false;
}
