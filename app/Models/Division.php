<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    use HasFactory;

    protected $fillable = [
        'region_id',
        'divison_name',
    ];

    public function region()
    {
        return $this->belongsTo(Region::class, 'region_id');
    }
}
