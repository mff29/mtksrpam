<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tagihan', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('pelanggan_id');
            $table->uuid('pemakaian_id');
            $table->uuid('abonemen_id');
            $table->integer('harga_per_meter');
            $table->integer('jumlah_pakai');
            $table->integer('administrasi');
            $table->string('telat');
            $table->integer('denda_keterlambatan');
            $table->integer('tagihan');
            $table->string('jenis_bayar');
            $table->string('status');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tagihan');
    }
};
