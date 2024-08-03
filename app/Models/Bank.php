<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bank extends Model
{
    use HasFactory, Uuids, SoftDeletes;

    protected $table = "bank";
    protected $fillable = ['jenis_bank','kode_bank','nomor_rekening','nama_rekening'];
}
