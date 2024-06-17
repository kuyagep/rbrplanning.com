<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    public function schoolyear()
    {
        return $this->belongsTo(SchoolYear::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}
