<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollageInfo extends Model
{
    use HasFactory;

    protected $table="collage_infos";
    protected $fillable = ["name",""];
}
