<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;

    protected $fillable = [
        'district_id',
        'school_id',
        'code',
        'name',
        'address',
        'mobile_number',
        'school_email',
        'logo',
        'description',
    ];
    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function extensionSchools()
    {
        return $this->hasMany(ExtensionSchool::class);
    }
    public function personnel()
    {
        return $this->hasMany(Personnel::class);
    }

    public function gradeLevel()
    {
        return $this->hasMany(GradeLevel::class);
    }

    public function gradeLevelCategory()
    {
        return $this->hasMany(GradeLevelCategory::class);
    }

    public function registeredLearners()
    {
        return $this->hasMany(RegisteredLearner::class);
    }

    public function inventoryOfSchoolBuildings()
    {
        return $this->hasMany(InventoryOfSchoolBuilding::class);
    }

    public function inventoryOfClassrooms()
    {
        return $this->hasMany(InventoryOfClassroom::class);
    }

}
