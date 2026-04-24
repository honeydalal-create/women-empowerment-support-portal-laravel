<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // For auth
use Illuminate\Notifications\Notifiable;

class Company extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'logo',
        'password',
    ];

    protected $hidden = [
        'password',
    ];
}
