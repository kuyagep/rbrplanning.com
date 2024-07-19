<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'grade_level',
    ];

    public function schools()
    {
        return $this->belongsToMany(School::class);
    }

    public function sections()
    {
        return $this->hasMany(Section::class);
    }
}
