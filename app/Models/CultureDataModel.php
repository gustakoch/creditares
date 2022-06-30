<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CultureDataModel extends Model
{
    use HasFactory;

    protected $table = "cultures_data";
    protected $primaryKey = "id";
    protected $guarded = [];
}
