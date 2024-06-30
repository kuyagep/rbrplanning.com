<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryOfFurniture extends Model
{
    use HasFactory;

    protected $fillable = [
        'school_id',
        'kinder_modular_table',
        'kinder_chair',
        'arm_chair',
        'school_desk',
        'other_classroom_table',
        'other_classroom_chair',
        'sets_of_tables_and_chairs',
    ];
    public function school()
    {
        return $this->belongsTo(School::class);
    }
}
