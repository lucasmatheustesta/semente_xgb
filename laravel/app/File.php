<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\School;
use App\FileCategorie;

class File extends Model
{
    protected $fillables = [
		'title',
		'file',
		'type',
		'school_id',
		'category_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function school()
    {
        return $this->belongsTo(School::class, 'school_id');
    }

    public function filecategorie()
    {
        return $this->belongsTo(FileCategorie::class, 'category_id');
    }
}
