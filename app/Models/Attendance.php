<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;


    protected $fillable = ['daily_ave_male', 'daily_ave_female', 'percentage_for_the_month_male', 'percentage_for_the_month_female'];

    public function schoolyear()
    {
        return $this->belongsTo(SchoolYear::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}
