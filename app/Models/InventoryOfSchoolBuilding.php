<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryOfSchoolBuilding extends Model
{
    use HasFactory;

    protected $fillable = [
        'school_id',
        'good_condition',
        'minor_repair',
        'major_repair',
        'condemnation_demolition',
        'on_going_contruction',
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
