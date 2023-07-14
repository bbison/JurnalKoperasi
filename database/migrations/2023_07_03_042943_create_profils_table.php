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
        Schema::create('profils', function (Blueprint $table) {
            $table->id();
            $table->text('nama_koperasi');
            $table->text('logo');
            $table->text('alamat');
            $table->text('telepon');
            $table->text('ketua');
            $table->text('wakil_ketua');
            $table->text('sekertaris');
            $table->text('bendahara');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profils');
    }
};
