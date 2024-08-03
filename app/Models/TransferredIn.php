<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransferredIn extends Model
{
    use HasFactory;

    protected $fillable = ['section_id', 'previous_month_male', 'previous_month_female', 'end_of_month_male', 'end_of_month_female'];
}
