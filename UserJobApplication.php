<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserJobApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'job_id',
        'resume_file',
        'status',
        'photo',
    ];

    // Relation: belongs to User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relation: belongs to JobListing
    public function job()
    {
        return $this->belongsTo(JobListing::class);
    }
}
