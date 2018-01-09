<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LocalTrabalho extends Model
{
  
    protected $table = "locais_trabalhos";

    protected $fillable = [
      'nome',
      'tipo_id'
    ];

    public function tipo()
    {
        return $this->hasOne(TipoLocalTrabalho::class, 'id');
    }

    public function contatos()
    {
    	return $this->belongsToMany(Contato::class, 'contato_localtrabalho', 'localtrabalho_id', 'contato_id');
    }
}
