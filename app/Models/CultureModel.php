<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CultureModel extends Model
{
    use HasFactory;

    protected $table = "cultures";
    protected $primaryKey = "id";
    protected $guarded = [];
}
