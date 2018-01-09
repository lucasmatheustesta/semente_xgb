<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entidade extends Model
{

    protected $fillable = [
      'nome',
      'sigla',
      'cnpj',
      'data_fundacao',
      'classificacao_id',
      'secretario',
      'secretaria',
      'website',
      'email',
      'fone1',
      'fone2',
      'fax'
    ];

    public function classificacao()
    {
        return $this->hasOne(EntidadeClassificacao::class, 'id');
    }
}
