<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    protected $fillable = [
    	'title'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
