<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentMark extends Model
{
    use HasFactory;

    protected $fillable = [

        'student-name',
        'student_id',
        'study_year_id',
        'season_id',
        'subject_id',
        'mark',
    ];
}
