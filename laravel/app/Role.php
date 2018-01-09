<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	protected $fillable = [
       'user_id', 'role_id', 'description',
    ];

    public function permissions()
    {
    	return $this->belongsToMany(Permission::class);
    }
}
