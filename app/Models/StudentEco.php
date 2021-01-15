<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentEco extends Model
{
    use HasFactory;
    protected $table="student_ecos";
    protected $fillable = ["tilte","description",];
}
