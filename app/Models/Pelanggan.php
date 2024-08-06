<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pelanggan extends Model
{
    use HasFactory, Uuids, SoftDeletes;

    protected $table = "pelanggan";
    protected $fillable =['kode','nama','no_hp','desa','rt','rw','status'];

    public function pemakaian()
    {
        return $this->hasMany(\App\Models\Pemakaian::class);
    }
}
