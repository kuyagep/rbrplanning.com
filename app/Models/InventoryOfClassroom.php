<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryOfClassroom extends Model
{
    use HasFactory;

    protected $fillable = [
        'school_id',
        'good_condition',
        'minor_repair',
        'major_repair',
        'comdemnation_demolition',
        'on_going_construction',
        'for_completion',
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
