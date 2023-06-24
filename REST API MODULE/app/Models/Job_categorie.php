<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job_categorie extends Model
{
    use HasFactory;

    public function job_vacancies()
    {
        return $this->hasMany(Job_categorie::class);
    }
}
