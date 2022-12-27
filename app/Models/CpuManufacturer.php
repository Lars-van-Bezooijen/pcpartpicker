<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CpuManufacturer extends Model
{
    use HasFactory;
    protected $table = 'cpu_manufacturers';
    protected $guarded = [];
}
