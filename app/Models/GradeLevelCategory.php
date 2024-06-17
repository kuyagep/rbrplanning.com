<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradeLevelCategory extends Model
{
    use HasFactory;

    public function gradeLevel()
    {
        return $this->hasMany(GradeLevel::class);
    }
}
