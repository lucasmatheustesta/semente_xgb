<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clinica extends Model
{
    protected $fillable = [
       'phone', 
       'site', 
       'address', 
       'bairro', 
       'cidade_id', 
       'estado_id', 
       'address_r', 
       'bairro_r', 
       'cidader_id', 
       'estador_id', 
       'responsavel', 
       'type', 
       'cpf_cnpj', 
       'rg', 
       'user_id', 
       'accepted',
       'pagamento',
       'contrato'
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
