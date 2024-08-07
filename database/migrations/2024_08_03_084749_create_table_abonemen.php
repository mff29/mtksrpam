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
        Schema::create('abonemen', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('level');
            $table->integer('harga');
            $table->integer('administrasi');
            $table->integer('denda_keterlambatan');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abonemen');
    }
};
