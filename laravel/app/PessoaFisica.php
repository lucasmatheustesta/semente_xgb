<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PessoaFisica extends Model
{
  
    protected $table = "fisicas";

    protected $fillable = [
      'nome',
      'uf_crm',
      'n_crm',

      'cpf',
      'data_nascimento',
      'sexo',

      'nacionalidade',
      'naturalidade',
      'uf',
      
      'rg',
      'orgao_emissor',
      'matricula',
      
      'entidade',
      'categoria_profissional',
      'estado_civil',
      'nome_conjuge',

      'observacoes',

      'receber_email',
      'receber_revista',
      'falecido',
      'data_falecimento',

      'foto'
    ];

    public function user()
    {
    	return $this->belongsTo(User::class, 'user_id');
    }

    public function city()
    {
      return $this->belongsTo(City::class, 'cidade_id');
    }

    public function city_r()
    {
      return $this->belongsTo(City::class, 'cidader_id');
    }

    public function state()
    {
      return $this->belongsTo(State::class, 'estado_id');
    }

    public function state_r()
    {
      return $this->belongsTo(State::class, 'estador_id');
    }

    public function consultors()
    {
    	return $this->belongsToMany(Consultor::class, 'clinica_consultor', 'clinica_id', 'consultor_id');
    }

    public function pacientes()
    {
        return $this->hasMany(Paciente::class, 'clinica_id');
    }

    public function vendas()
    {
        return $this->hasMany(Venda::class, 'clinica_id');
    }
}
