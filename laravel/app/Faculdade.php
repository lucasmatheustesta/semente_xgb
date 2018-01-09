<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faculdade extends Model
{
  
    protected $table = "faculdades";

    protected $fillable = [
      'nome'
    ];
}
