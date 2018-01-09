<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Venda extends Model
{
    use SoftDeletes;

    protected $fillable = [
       'consultor_id', 'clinica_id', 'paciente_id', 'date', 'obs'
    ];

    public function consultor()
    {
    	return $this->belongsTo(Consultor::class, 'consultor_id');
    }

    public function clinica()
    {
    	return $this->belongsTo(Clinica::class, 'clinica_id');
    }

    public function paciente()
    {
    	return $this->belongsTo(Paciente::class, 'paciente_id');
    }

    public function servicos()
    {
        return $this->belongsToMany(Servico::class, 'servico_venda', 'venda_id', 'servico_id');
    }
}
