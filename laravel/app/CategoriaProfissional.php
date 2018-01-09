<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriaProfissional extends Model
{
  
    protected $table = "categorias_profissionais";

    protected $fillable = [
      'nome',
      'tipo_pessoa'
    ];
}
