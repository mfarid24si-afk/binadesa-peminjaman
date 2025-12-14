<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameFileUrlToFileNameOnMediaTable extends Migration
{
    public function up()
    {
        Schema::table('media', function (Blueprint $table) {
            if (Schema::hasColumn('media', 'file_url')) {
                $table->renameColumn('file_url', 'file_name');
            } else {
                // fallback: kalau kolom belum ada, buat kolom baru
                $table->string('file_name')->nullable()->after('ref_id');
            }
        });
    }

    public function down()
    {
        Schema::table('media', function (Blueprint $table) {
            if (Schema::hasColumn('media', 'file_name')) {
                $table->renameColumn('file_name', 'file_url');
            }
        });
    }
}