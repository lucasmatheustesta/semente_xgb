<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $fillable = [
    	'name',
		'cpf',
		'image',
		'birthday',
		'mobile',
		'phone',
		'email',
		'address',
		'estado_id',
		'cidade_id',
		'bairro',
		'clinica_id',
		'consultor_id',
    ];

    public function clinica()
    {
    	return $this->belongsTo(Clinica::class, 'clinica_id');
    }

    public function consultor()
    {
    	return $this->belongsTo(Consultor::class, 'consultor_id');
    }

    public function venda()
    {
        return $this->hasOne(Venda::class, 'paciente_id');
    }
}
