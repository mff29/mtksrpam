<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kas extends Model
{
    use HasFactory, Uuids, SoftDeletes;

    protected $table = "kas";
    protected $fillable = ['tipe','deskripsi','nominal_pendapatan','nominal_pengeluaran'];
}
