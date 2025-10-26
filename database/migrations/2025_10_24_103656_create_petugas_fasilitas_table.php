<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('petugas_fasilitas', function (Blueprint $table) {
            $table->id('petugas_id');
            $table->foreignId('fasilitas_id')->constrained('fasilitas_umum', 'fasilitas_id')->cascadeOnDelete();
            $table->foreignId('petugas_warga_id')->constrained('warga', 'warga_id')->cascadeOnDelete();
            $table->string('peran');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('petugas_fasilitas');
    }
};
