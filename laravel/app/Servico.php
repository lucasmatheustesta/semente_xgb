<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    protected $fillable = [
       'title', 'type', 'implante', 'description',
    ];
}
