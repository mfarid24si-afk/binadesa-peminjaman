<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pembayaran_fasilitas', function (Blueprint $table) {
            $table->id('bayar_id');
            $table->foreignId('pinjam_id')->constrained('peminjaman_fasilitas', 'pinjam_id')->cascadeOnDelete();
            $table->date('tanggal');
            $table->decimal('jumlah', 12, 2);
            $table->string('metode')->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pembayaran_fasilitas');
    }
};

