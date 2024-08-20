<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SF4 extends Model
{
    use HasFactory;

    protected $fillable = [
        'school_year_id',
        'section_id',
        'month',
        'submitted_by',
        'no_of_male_registered_learners',
        'no_of_female_registered_learners',
        'daily_ave_male_attendance',
        'daily_ave_female_attendance',
        'percentage_for_the_month_male_attendance',
        'percentage_for_the_month_female_attendance',
        'previous_month_male_dropped_out',
        'previous_month_female_dropped_out',
        'end_of_month_male_dropped_out',
        'end_of_month_female_dropped_out',
        'previous_month_male_transferred_out',
        'previous_month_female_transferred_out',
        'end_of_month_male_transferred_out',
        'end_of_month_female_transferred_out',
        'previous_month_male_transferred_in',
        'previous_month_female_transferred_in',
        'end_of_month_male_transferred_in',
        'end_of_month_female_transferred_in',
        // Add other fields as needed
    ];

    /**
     * Get the school year that owns the SF4 report.
     */
    public function school_year()
    {
        return $this->belongsTo(SchoolYear::class);
    }

    /**
     * Get the section that owns the SF4 report.
     */
    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}
