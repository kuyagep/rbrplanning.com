<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmploymentStatus extends Model
{
    use HasFactory;

    public function personnel()
    {
        return $this->belongsTo(Personnel::class);
    }
    public function positions()
    {
        return $this->hasMany(Position::class);
    }
}
