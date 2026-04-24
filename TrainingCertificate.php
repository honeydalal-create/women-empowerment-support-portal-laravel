<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingCertificate extends Model
{
    use HasFactory;

    // The table name (optional if it follows Laravel naming convention)
    protected $table = 'training_certificates';

    // Fields that can be mass-assigned
    protected $fillable = [
        'user_id',
        'training_program',
        'certificate_file',
        'application_id', // if you also want to track the training application
    ];

    /**
     * Get the user (female_user) that owns the certificate
     */
    public function user()
    {
        return $this->belongsTo(FemaleUser::class, 'user_id');
    }

    /**
     * Optionally, link to the training application
     */
    public function application()
{
    return $this->belongsTo(TrainingApplication::class, 'application_id');
}
}
