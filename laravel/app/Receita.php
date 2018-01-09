<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receita extends Model
{
	protected $fillable = [
       'valor', 
       'data_cobranca', 
       'data_pagto',
       'status', 
       'venda_id', 
       'user_id',
       'servico_id', 
       'description', 
       'servicovenda_id',
    ];

    public function user()
    {
    	return $this->belongsTo(User::class, 'user_id');
    }

    public function venda()
    {
        return $this->belongsTo(Venda::class, 'venda_id')->withTrashed();
    }

    public function servico()
    {
        return $this->belongsTo(Servico::class, 'servico_id');
    }
}
