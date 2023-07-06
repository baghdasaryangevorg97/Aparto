<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employe extends Authenticatable implements JWTSubject
{
    use Notifiable;

    protected $collection = 'employes';
    protected $fillable = [
        'full_name',
        'email',
        'role',
        'phone',
        'password',
    ];

    protected $hidden = ['password']; 

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

     public function getJWTCustomClaims()
    {
        return [];
    }
}
