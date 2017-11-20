<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

// les rôles applicatifs
define('ROLE_ADMIN',     1);
define('ROLE_NATIONAL',  2);
define('ROLE_REGIONAL',  3);
define('ROLE_ORGANISME', 4);

class User extends Authenticatable
{
    use Notifiable;

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

    public function isAdmin()
    {
        return $this->role==ROLE_ADMIN;
    }

    public function name()
    {
        return ucwords($this->name);
    }
}
