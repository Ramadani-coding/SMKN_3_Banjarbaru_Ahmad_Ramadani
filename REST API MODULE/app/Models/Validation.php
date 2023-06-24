<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Validation extends Model
{
    use HasFactory;

    protected $fillable = [
        'work_experience',
        'job_category_id',
        'job_position',
        'reason_accepted',
        'society_id',
    ];

}
