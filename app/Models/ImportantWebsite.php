<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImportantWebsite extends Model
{
    use HasFactory;

    protected $table="important_websites";
    protected $fillable = ["name","type","link"];
}
