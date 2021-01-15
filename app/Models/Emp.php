<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emp extends Model
{
    use HasFactory;
    protected $table="emps";

    protected $fillable = ["name", "mobile","email","rule",];
//    protected $hidden=["rule"];

}
