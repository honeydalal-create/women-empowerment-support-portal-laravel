<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    protected $fillable = [
        'female_user_id',
        'name',
        'email',
        'resume'
    ];

    public function femaleUser()
    {
        return $this->belongsTo(FemaleUser::class, 'female_user_id');
    }
}
