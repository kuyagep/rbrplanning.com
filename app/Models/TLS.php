<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TLS extends Model
{
    use HasFactory;
    protected $fillable = [
        'school_id',
        'no_of_tls',
        'no_of_classes_in_tls',
        'school_year_id',
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
