<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Strand extends Model
{
    use HasFactory;

    public function gradeLevel()
    {
        return $this->belongsTo(GradeLevel::class);
    }

    public function sections()
    {
        return $this->hasMany(Section::class);
    }

}
