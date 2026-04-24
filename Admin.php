<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $table = 'admins';

    protected $fillable = [
        'full_name',
        'email',
        'password',
        'contact_no',
        'address',
        'city',
        'state',
        'profile_photo',
    ];

    protected $hidden = [
        'password',
    ];
}
