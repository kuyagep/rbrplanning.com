<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradeLevel extends Model
{
    use HasFactory;

    public function gradeLevelCategory()
    {
        return $this->belongsTo(GradeLevelCategory::class);
    }
}
