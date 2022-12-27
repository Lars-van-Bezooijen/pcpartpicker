<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CpuSockets extends Model
{
    use HasFactory;
    protected $table = 'cpu_sockets';
    protected $guarded = [];
}
