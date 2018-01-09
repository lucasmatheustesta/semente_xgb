<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\VideoCategorie;
use App\Year;

class Video extends Model
{
    protected $fillable = [
    	'title',
		'url',
		'type',
		'year_id',
		'category_id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function videocategorie()
    {
        return $this->belongsTo(VideoCategorie::class, 'category_id');
    }

    public function year()
    {
        return $this->belongsTo(Year::class, 'year_id');
    }
}
