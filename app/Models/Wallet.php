<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\SoftDeletes;

class Wallet extends Model
{
    use HasFactory, Uuids, SoftDeletes;

    protected $table = "wallet";
    protected $fillable = ['jenis','kode','nomor_rekening','nama_rekening'];
}
