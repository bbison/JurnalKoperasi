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
        Schema::create('sub_rekenings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sub_kelompok_rekening_id');
            $table->text('kode_sub_rekening');
            $table->text('nama_rekening');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_rekenings');
    }
};
