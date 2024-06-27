<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Strand extends Model
{
    use HasFactory;

    protected $fillable = ['track_id', 'name', 'id'];
    public function gradeLevel()
    {
        return $this->belongsTo(GradeLevel::class);
    }

    public function sections()
    {
        return $this->hasMany(Section::class);
    }

    public function track()
    {
        return $this->belongsTo(Track::class);
    }

    /**
     * Get all of the specializations for the Strand
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function specializations(): HasMany
    {
        return $this->hasMan(Specialization::class, 'foreign_key', 'local_key');
    }

}
