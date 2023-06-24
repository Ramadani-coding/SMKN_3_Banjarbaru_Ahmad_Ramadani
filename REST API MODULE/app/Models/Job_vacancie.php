<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job_vacancie extends Model
{
    use HasFactory;

    public function job_categorie()
    {
        return $this->belongsTo(Job_categorie::class);
    }
}
