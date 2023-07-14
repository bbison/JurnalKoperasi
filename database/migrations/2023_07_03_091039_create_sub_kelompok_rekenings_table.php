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
        Schema::create('sub_kelompok_rekenings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kelompok_rekening_id');
            $table->text('kode_sub_kelompok');
            $table->text('nama_sub_kelompok');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_kelompok_rekenings');
    }
};
