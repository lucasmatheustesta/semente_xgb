<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileCategorie extends Model
{
    protected $table = 'filecategories';

    protected $fillable = [
    	'title'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
