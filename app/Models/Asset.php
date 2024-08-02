<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\SoftDeletes;

class Asset extends Model
{
    use HasFactory, Uuids, SoftDeletes;

    protected $table = "asset";
    protected $fillable = ['nama','kategori','harga','satuan','qty','jumlah','tgl_beli','keterangan'];
}
