<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'training_id',
        'name',
        'email',
        'phone',
        'payment_mode',
        'status',
    ];

    // ✅ ADD THIS (VERY IMPORTANT)
    public function user()
    {
        return $this->belongsTo(FemaleUser::class, 'user_id');
    }

    // ✅ Training relation
    public function training()
    {
        return $this->belongsTo(Training::class, 'training_id');
    }

    // TrainingApplication.php
public function certificate()
{
    return $this->hasOne(TrainingCertificate::class, 'application_id');
}

}
