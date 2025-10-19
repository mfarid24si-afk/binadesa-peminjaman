<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::create('fasilitas_desa', function (Blueprint $table) {
        $table->id('peminjam_id');
        $table->string('first_name');
        $table->string('last_name');
        $table->date('birthday');
        $table->string('gender', 20); // ← Ubah dari default ke 20 karakter
        $table->string('phone');
        $table->string('barang');
        $table->timestamps();
    });
}

    public function down()
    {
        Schema::dropIfExists('fasilitas_desa');
    }
};