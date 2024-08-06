<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pemakaian extends Model
{
    use HasFactory, Uuids, SoftDeletes;

    protected $table = "pemakaian";
    protected $fillable = ['pelanggan_id','bulan','meter_awal','meter_akhir','pakai'];

    public function pelanggan()
    {
        return $this->belongsTo(\App\Models\Pelanggan::class);
    }
}
