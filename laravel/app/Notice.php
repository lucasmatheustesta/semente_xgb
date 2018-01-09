<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    protected $filllable = [
    	'title',
		'subtitle',
		'notice'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
