<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function registeredLearner()
    {
        return $this->hasMany(RegisteredLearner::class);
    }

    public function attendance()
    {
        return $this->hasMany(Attendance::class);
    }
}
