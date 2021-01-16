<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YearSubject extends Model
{
    use HasFactory;

    protected $fillable = [
        'year_id', 'subject_id', 'season_id', 'specialization_id'
    ];
}
