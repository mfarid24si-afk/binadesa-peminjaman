<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Model untuk tabel legacy 'fasilitas_desa'.
 * Tabel ini merupakan sisa migrasi awal dan mungkin akan dihapus di TAHAP 3.
 */
class Pinjam extends Model
{
    protected $table = 'fasilitas_desa';
    protected $primaryKey = 'peminjam_id';
    public $incrementing = true;
    protected $fillable = [
        'first_name',
        'last_name',
        'birthday',
        'gender',
        'phone',
        'barang',
    ];
}

