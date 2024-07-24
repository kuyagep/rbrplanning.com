<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personnel extends Model
{
    use HasFactory;

    protected $table = 'personnels';
    protected $fillable = [
        'employee_number',
        'item_number',
        'first_name',
        'last_name',
        'middle_name',
        'birth_date',
        'mobile_number',
        'deped_email',
        'sex',
        'employment_status_id',
        'position_id',
        'school_id',
        'funding_source_id',
        'remarks',
    ];

    public function getFullNameAttribute()
    {
        return implode(' ', [$this->first_name, $this->middle_name, $this->last_name]);
    }
    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function employmentStatus()
    {
        return $this->belongsTo(EmploymentStatus::class);
    }

    public function fundingSource()
    {
        return $this->belongsTo(FundingSource::class);
    }

    public function sections()
    {
        return $this->belongsTo(Section::class);
    }
}
