<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('peminjaman_fasilitas', function (Blueprint $table) {
            $table->id('pinjam_id');
            $table->foreignId('fasilitas_id')->constrained('fasilitas_umum', 'fasilitas_id')->cascadeOnDelete();
            $table->foreignId('warga_id')->constrained('warga', 'warga_id')->cascadeOnDelete();
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->string('tujuan');
            $table->string('status')->default('pending');
            $table->decimal('total_biaya', 12, 2)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('peminjaman_fasilitas');
    }
};

