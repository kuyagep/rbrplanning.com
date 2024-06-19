<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExtensionSchool extends Model
{
    use HasFactory;
    protected $fillable = [
        'school_id',
        'schoolid',
        'school_name',
        'address',
        'mobile_number',
        'school_email',
        'logo',
    ];
    public function school()
    {
        return $this->belongsTo(School::class);
    }
}
