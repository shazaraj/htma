<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamResult extends Model
{
    use HasFactory;
    protected $table="exam_results";

    protected $fillable = ["name","file","date"];
//    protected $casts =[
//        'created_at' =>'date',
//    ];


}
