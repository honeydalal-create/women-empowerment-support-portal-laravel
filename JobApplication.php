<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'name', 'job_title', 'company_name', 'phone', 'email', 'message', 'resume'
    ];

    public function user()
    {
        return $this->belongsTo(FemaleUser::class, 'user_id');
    }
}
