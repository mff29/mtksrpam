<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tagihan extends Model
{
    use HasFactory, Uuids, SoftDeletes;

    protected $table = "tagihan";
    protected $fillable = ['pelanggan_id','pemakaian_id','abonemen_id','harga_per_meter','jumlah_pakai','administrasi','tagihan','jenis_bayar','status'];

    public function pelanggan()
    {
        return $this->belongsTo(\App\Models\Pelanggan::class);
    }

    public function pemakaian()
    {
        return $this->belongsTo(\App\Models\Pemakaian::class);
    }
    
    public function abonemen()
    {
        return $this->belongsTo(\App\Models\Abonemen::class);
    }
}
