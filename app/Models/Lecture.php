<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    use HasFactory;
    protected $table="lectures";
    protected $fillable = ["name", "subject_id", "study_year_id", "direct_link", "drive_link", "season_id"];

}
