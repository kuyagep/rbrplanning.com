<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MakeShift extends Model
{
    use HasFactory;
    protected $fillable = [
        'school_id',
        'no_of_makeshift_rooms',
        'no_of_classes_in_makeshift_rooms',
    ];
    public function school()
    {
        return $this->belongsTo(School::class);
    }
}
