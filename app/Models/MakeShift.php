<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MakeShift extends Model
{
    use HasFactory;
    protected $fillable = [
        'school_id',
        'no_of_makeshift_rooms',
        'no_of_classes_in_makeshift_rooms',
        'school_year_id',
    ];

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function schoolYear()
    {
        return $this->belongsTo(SchoolYear::class);
    }
}
