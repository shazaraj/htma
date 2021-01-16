<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpRule extends Model
{
    use HasFactory;
    protected $table="emp_rule";
    protected $fillable = ["rule_name",];

}
