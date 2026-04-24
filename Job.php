<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $table = 'jobs';

    protected $fillable = [
        'title',
        'company',
        'location',
        'salary',
        'skills',
        'description',
        'status'
    ];

    /**
     * A job can have many applications
     */
    public function applications()
    {
        return $this->hasMany(JobApplication::class);
    }
}
