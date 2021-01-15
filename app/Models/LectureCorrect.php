<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LectureCorrect extends Model
{
    use HasFactory;
    protected $table="lecture_corrects";
    protected $fillable = ["subject", "year_id", "study_year_id", "direct_link", "drive_link", "season_id"];

}
