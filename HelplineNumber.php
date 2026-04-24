<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HelplineNumber extends Model
{
    use HasFactory;

    protected $table = 'helpline_numbers';

    protected $fillable = [
        'name',
        'number',
        'description',
    ];
}
