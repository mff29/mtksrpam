<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pemakaian extends Model
{
    use HasFactory, Uuids, SoftDeletes;

    protected $table = "pemakaian";
    protected $fillable = ['pelanggan_id','bulan','meter_awal','meter_akhir','pakai','status'];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });

        static::creating(function ($pemakaian) {
            if (empty($pemakaian->status)) {
                $pemakaian->status = 'PENDING';
            }
        });
    }

    public function pelanggan()
    {
        return $this->belongsTo(\App\Models\Pelanggan::class);
    }
    public function abonemen()
    {
        return $this->belongsTo(\App\Models\Abonemen::class);
    }
    public function tagihan()
    {
        return $this->hasMany(\App\Models\Tagihan::class);
    }
}
