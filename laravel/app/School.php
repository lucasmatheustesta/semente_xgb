<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable = [
    	'name',
		'email',
		'address',
		'phone',
		'validity',
		'image',
		'contact',
		'student_code',
		'teacher_code',
		'state_id',
		'citie_id',
        'district',
        'complement'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
