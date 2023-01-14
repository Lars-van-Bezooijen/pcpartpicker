<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CpuManufacturer;
use App\Models\CpuSeries;
use App\Models\CpuSockets;


class Cpu extends Model
{
    use HasFactory;
    protected $table = 'cpus';
    protected $guarded = [];

    public function manufacturer()
    {
        return $this->belongsTo(CpuManufacturer::class, 'manufacturer_id');
    }

    public function series()
    {
        return $this->belongsTo(CpuSeries::class, 'series_id');
    }

    public function socket()
    {
        return $this->belongsTo(CpuSockets::class, 'socket_id');
    }
}
