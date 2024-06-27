<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Track extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name'];

    /**
     * Get all of the strand for the Track
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function strands(): HasMany
    {
        return $this->hasMany(Strand::class);
    }
}
