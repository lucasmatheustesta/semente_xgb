<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServicoVenda extends Model
{
    use SoftDeletes;
    
    protected $table = 'servico_venda';
    public $timestamps = false;

    protected $fillable = [
       'servico_id', 'venda_id', 'vigencia', 'valor', 'pasta', 'user_id'
    ];

    public function servico()
    {
    	return $this->belongsTo(Servico::class, 'servico_id');
    }

    public function venda()
    {
        return $this->belongsTo(Venda::class, 'venda_id');
    }
}
