<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Year;
use App\School;

class Classe extends Model
{
    protected $fillable = [
		'name',
		'number',
		'year_id',
		'school_id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function year()
    {
        return $this->belongsTo(Year::class, 'year_id');
    }

    public function school()
    {
        return $this->belongsTo(School::class, 'school_id');
    }
}
