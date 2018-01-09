<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VideoCategorie extends Model
{
    protected $table = 'videocategories';

    protected $fillables = [
    	'title',
		'featured'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
