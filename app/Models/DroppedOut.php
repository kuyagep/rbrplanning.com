<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DroppedOut extends Model
{
    use HasFactory;
    protected $fillable = ['section_id', 'previous_month_male', 'previous_month_female', 'end_of_month_male', 'end_of_month_female'];

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function schoolyear()
    {
        return $this->belongsTo(SchoolYear::class);
    }
}
