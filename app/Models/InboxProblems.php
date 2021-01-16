<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InboxProblems extends Model
{
    use HasFactory;
    protected $table="inbox_problems";
    protected $fillable = ["problems","created_at"];

}
