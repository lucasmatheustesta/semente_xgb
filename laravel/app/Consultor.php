<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consultor extends Model
{
    protected $fillable = [
		'cpf',
		'birthday',
		'mobile',
        'phone',
		'code',
		'address',
		'estado_id',
		'cidade_id',
		'bairro',
		'user_id',
    ];

    public function user()
    {
    	return $this->belongsTo(User::class, 'user_id');
    }

    public function clinicas()
    {
    	return $this->belongsToMany(Clinica::class, 'clinica_consultor', 'consultor_id', 'clinica_id');
    }
}
