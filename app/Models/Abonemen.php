<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\SoftDeletes;

class Abonemen extends Model
{
    use HasFactory, Uuids, SoftDeletes;

    protected $table = "abonemen";
    protected $fillable = ['level','harga','administrasi','denda_keterlambatan'];
}
