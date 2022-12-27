<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CpuSeries extends Model
{
    use HasFactory;
    protected $table = 'cpu_series';
    protected $guarded = [];
}
