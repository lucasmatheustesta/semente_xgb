<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    const ROLE_ADMIN = 'admin';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function hasPermission (Permission $permission)
    {
        //quais são os papeis que podem execultar essas tarefas?
        return $this->hasAnyRoles($permission->roles);
    }

    public function hasAnyRoles($roles)
    {
        //o usuario tem esse papel para execultar?
        if(is_array($roles) || is_object($roles) ) {
            return !! $roles->intersect($this->roles)->count();
        }
        //manager exemplo de nome
        return $this->roles->contains('name', $roles);
    }

    public static function hasAdmin()
    {
        foreach (auth()->user()->roles as $role) {
            if ($role->name == 'admin') {
                return true;
            }
        }
        return false;
    }
}
