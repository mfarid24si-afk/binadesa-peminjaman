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
        Schema::create('peminjaman_log', function (Blueprint $table) {
            $table->id('log_id');
            $table->foreignId('pinjam_id')->constrained('peminjaman_fasilitas', 'pinjam_id')->cascadeOnDelete();
            $table->string('status')->default('pending');
            $table->text('keterangan')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users', 'id')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjaman_log');
    }
};
