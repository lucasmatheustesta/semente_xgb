<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AreaInteresse extends Model
{
  
    protected $table = "areas_interesses";

    protected $fillable = [
      'nome'
    ];
}
