<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class FemaleUser extends Authenticatable
{
    use Notifiable;

    protected $table = 'female_users';

    protected $fillable = [
        'name', 'email', 'phone', 'gender', 'date_of_birth',
        'city', 'state', 'occupation', 'address', 'profile_photo', 'password', 'role'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    // Automatically hash passwords
    public function setPasswordAttribute($password)
    {
        if ($password) {
            $this->attributes['password'] = bcrypt($password);
        }
    }

    // One woman has many job applications
    public function jobApplications()
    {
        return $this->hasMany(JobApplication::class, 'woman_id');
    }

    // One woman has one resume
    public function resume()
    {
        return $this->hasOne(Resume::class, 'female_user_id');
    }

    // One woman has many certificates
    public function certificates()
    {
        return $this->hasMany(TrainingCertificate::class, 'user_id');
    }
}
